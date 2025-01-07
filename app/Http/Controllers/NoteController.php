<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    // /**
    //  * Display a listing of the notes.
    //  */
    // public function index(Request $request)
    // {
    //     // Get the user_id from the query parameter or session (or another custom method)
    //     $userId = $request->query('user_id'); // or use session('user_id')

    //     // Fetch notes for the user
    //     $notes = Note::where('user_id', $userId)->paginate(10);

    //     // Pass notes to the index view
    //     return view('note.index', compact('notes'));
    // }

    // /**
    //  * Show the form for creating a new note.
    //  */
    // public function create()
    // {
    //     return view('note.create');
    // }

    // /**
    //  * Store a newly created note.
    //  */
    // public function store(Request $request)
    // {
    //     // Get the user_id from the request or session
    //     $userId = $request->query('user_id'); // or use session('user_id')

    //     // Validate the incoming request
    //     $data = $request->validate([
    //         'note' => ['required', 'string']
    //     ]);

    //     // Add the user_id to the data
    //     $data['user_id'] = $userId;

    //     // Create the note
    //     $note = Note::create($data);

    //     // Redirect to the note's details page with a success message
    //     return to_route('note.show', $note)->with('message', 'Note was created successfully.');
    // }

    // /**
    //  * Display the specified note.
    //  */
    // public function show(Note $note)
    // {
    //     // Ensure the user owns the note
    //     $this->authorizeNoteOwnership($note);

    //     // Pass the note to the show view
    //     return view('note.show', compact('note'));
    // }

    // /**
    //  * Show the form for editing the specified note.
    //  */
    // public function edit(Note $note)
    // {
    //     // Ensure the user owns the note
    //     $this->authorizeNoteOwnership($note);

    //     // Pass the note to the edit view
    //     return view('note.edit', compact('note'));
    // }

    // /**
    //  * Update the specified note.
    //  */
    // public function update(Request $request, Note $note)
    // {
    //     // Ensure the user owns the note
    //     $this->authorizeNoteOwnership($note);

    //     // Validate the incoming request
    //     $data = $request->validate([
    //         'note' => ['required', 'string']
    //     ]);

    //     // Update the note
    //     $note->update($data);

    //     // Redirect to the note's details page with a success message
    //     return to_route('note.show', $note)->with('message', 'Note was updated successfully.');
    // }

    // /**
    //  * Remove the specified note.
    //  */
    // public function destroy(Note $note)
    // {
    //     // Ensure the user owns the note
    //     $this->authorizeNoteOwnership($note);

    //     // Delete the note
    //     $note->delete();

    //     // Redirect to the index page with a success message
    //     return to_route('note.index')->with('message', 'Note was deleted successfully.');
    // }

    // /**
    //  * Helper method to ensure the user owns the note.
    //  */
    // private function authorizeNoteOwnership(Note $note)
    // {
    //     // Check if the note's user_id matches the current user_id
    //     if ($note->user_id !== request()->query('user_id')) {
    //         abort(403, 'Unauthorized access.');
    //     }
    // }
    // In the index method
// public function index(Request $request)
// {
//     // Get the user_id from query parameter or session
//     $user_id = $request->query('user_id'); // Or use session('user_id') if you store it in the session
//     dd($user_id);
//     // // Paginate the notes, showing 10 notes per page
//     // $notes = Note::paginate(10);

//     // Fetch notes for the user
//     $notes = Note::where('user_id', $user_id)->paginate(10);
//     dd($notes);
//     return view('note.index', compact('notes', 'user_id'));
// }
// public function create(Request $request)
// {
//     // You can optionally pass a user_id through the query parameter, or use session if necessary
//     // You can also handle this logic here if the user_id is being passed or stored elsewhere

//     $user_id = $request->query('user_id'); // Or use session('user_id') if applicable

//     // Pass the user_id to the view, in case you need it for the form (e.g., for saving the note later)
//     return view('note.create', compact('user_id'));
// }

// // Store method
// public function store(Request $request)
// {
//     // Validate the incoming request
//     $data = $request->validate([
//         'note' => ['required', 'string', 'max:500'],  // Optionally, you can limit the length of the note.
//     ]);

//     // Ensure user_id is included in the request
//     // Since we're allowing users to pass user_id, ensure it's a valid user (optional for safety)
//     $userId = $request->input('user_id');

//     // Add validation to ensure user_id is not empty or invalid
//     if (!$userId) {
//         return redirect()->back()->withErrors(['user_id' => 'User ID is required.']);
//     }

//     // Add the user_id to the data array
//     $data['user_id'] = $userId;

//     // Create the note
//     $note = Note::create($data);

//     // Redirect to the note's show page with a success message
//     return redirect()->route('note.show', $note)->with('message', 'Note was created successfully.');
// }



// // Show, Edit, Update, Destroy methods
// public function show(Note $note, Request $request)
// {
//     $userId = $request->query('user_id');
    
//     if ($note->user_id !== $userId) {
//         abort(403, 'Unauthorized access.');
//     }
//     return view('note.show', compact('note'));
// }

// public function edit(Note $note, Request $request)
// {
//     $user_id = $request->query('user_id');
    
//     if ($note->user_id !== $user_id) {
//         abort(403, 'Unauthorized access.');
//     }
//     return view('note.edit', compact('note','user_id'));
// }

// Similar for the update and destroy methods
public function add(Request $request)
    {
        // Get the user_id from the query parameter or session (or another custom method)
        $user_id = $request->user_id; // or use session('user_id')
        $note = $request->note; // or use session('user_id')
        // Fetch notes for the user
        $existingNote = DB::table('notes')
        ->where('user_id', $user_id)
        ->where('note', $note)
        ->first();
    if (!$existingNote) {
    // Insert the to-do into the database
        DB::insert("insert into notes (user_id,note) values(?, ?)",[$user_id,$note]);
    }
        // DB::insert("insert into notes values('note','user_id') where user_id=");
        $data = DB::table('notes')->select('*')->where('user_id', $user_id)->get();
        $user = DB::table('my_users')->where('id', $user_id)->first();
        // Pass notes to the index view
        return view('note', ['data' => $data, 'user_id' => $user_id,'user'=>$user]);
    }
    public function show(Request $request)
    {
        // Get the user_id from the query parameter or session (or another custom method)
        $user_id = $request->user_id; // or use session('user_id')

        // Fetch notes for the user
        $data = DB::table('notes')->select('*')->where('user_id', $user_id)->get();
        $user = DB::table('my_users')->where('id', $user_id)->first();
        // Pass notes to the index view
        return view('note', ['data' => $data, 'user_id' => $user_id,'user'=>$user]);
    }
}
