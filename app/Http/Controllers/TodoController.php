<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function add(Request $request)
{
    // Validate input
    $request->validate([
        'todos' => 'required|string',
        'user_id' => 'required|integer',
    ]);

    // Get the user_id and to-do item from the request
    $user_id = $request->user_id;
    $todos = $request->todos;
   

    $existingTodo = DB::table('todos')
    ->where('user_id', $user_id)
    ->where('title', $todos)
    ->first();
    if (!$existingTodo) {
    // Insert the to-do into the database
        DB::insert("insert into todos (user_id, title) values(?, ?)", [$user_id, $todos]);
    }
    // Fetch the updated list of todos for the user
    $data = DB::table('todos')->select('*')->where('user_id', $user_id)->get();
    
    // Pass the data to the dashboard view
    return view('dashboard', ['data' => $data, 'user_id' => $user_id]);
}

public function show(Request $request)
{
    // Get the user_id from the query parameter
    $user_id = $request->query('user_id');

    // Fetch the todos for the user
    $data = DB::table('todos')->select('*')->where('user_id', $user_id)->get();

    // Pass the data to the dashboard view
    return view('dashboard', ['data' => $data, 'user_id' => $user_id]);
}

}
