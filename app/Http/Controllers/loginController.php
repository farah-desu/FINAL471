<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    //
    public function logIn(Request $request)
    {

        $email = $request->email;
        $psw = $request->psw;
        // Check if the user exists
        $user = DB::table('my_users')->where('email', $email)->first();
        if ($user) {
            // Verify the password
            if ($psw === $user->password) {
                return view('home', ['user_id' => json_encode($user->id)]);
            } else {
                return back()->with('message', 'Incorrect password!');
            }
        } else {

            return back()->with('message', 'User not found!');
        }
    }
    public function signUp(Request $request)
    {

            $email = $request->email;
            $psw = $request->psw;

            // Insert the new user into the database
            $user = DB::table('my_users')->insert([
                'email' => $email,
                'password' => $psw,
            ]);
            

            //get newly inserted id
            $user_id= DB::table('my_users')->where('email', $email)->first()->id;

            // Create an empty cart for the new user
            DB::table('carts')->insert([
                'user_id' => $user_id,
            ]);

            return view('home', ['user_id' => json_encode($user_id)]);
        }
    
}
