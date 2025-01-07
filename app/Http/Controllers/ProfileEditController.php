<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileEditController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
{
    // Retrieve the user_id from the query string
    $user_id = $request->query('user_id');

    // Validate the presence of user_id
    if (!$user_id) {
        return redirect('/login')->with('message', 'User ID is missing. Please log in.');
    }

    // Fetch the user from the database (optional)
    $user = DB::table('my_users')->where('id', $user_id)->first();

    if (!$user) {
        return redirect('/login')->with('message', 'User not found.');
    }

    // Pass the user_id to the view
    return view('profileEdit', ['user_id' => $user_id,'user'=>$user]);
}


}
