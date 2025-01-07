<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index(Request $request)
    {   

        $user_id = $request->user_id;
        return view('home',['user_id' => json_encode($user_id)]);
    }
    public function dash(Request $request)
    {   
        $user_id = $request->user_id;
        $data = DB::table('todos')->select('*')->where('user_id', $user_id)->get();
        $user = DB::table('my_users')->where('id', $user_id)->first();
        // Pass notes to the index view
        return view('dashboard', ['data' => $data, 'user_id' => $user_id,'user'=>$user]);
    }
    // public function profile(Request $request)
    // {   
    //     $user_id = $request->user_id;
    //     return view('profile',['user_id' => $user_id]);
    // }
}
