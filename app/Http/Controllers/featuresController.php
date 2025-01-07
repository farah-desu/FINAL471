<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class featuresController extends Controller
{
    //
    public function wallpaper(Request $request){
        $user_id = $request->user_id; //user found
        $data = DB::table('wallpapers')
            ->join('features', 'wallpapers.id', '=', 'features.id') 
            ->select('features.*')
            ->distinct() 
            ->get();
        return view("wallpaper", ['json_data' => json_encode($data),'user_id' => json_encode($user_id)]);
    }

    
    public function profile_pic(Request $request){
        $user_id = $request->user_id; //user found
        $data = DB::table('profile_pics')
            ->join('features', 'features.id', '=', 'profile_pics.id') 
            ->select('features.*')
            ->distinct() 
            ->get();
        return view("profilePic", ['json_data' => json_encode($data),'user_id' => json_encode($user_id)]);
        // return response()->json([
        //         'json_data' => $data,
        //         'user_id' => $user_id,
        //     ]);
    }
    public function music(Request $request){
        $user_id = $request->user_id; //user found
        $data = DB::table('music')
            ->join('features', 'features.id', '=', 'music.id') 
            ->select('features.*')
            ->distinct() 
            ->get();
        return view("music", ['json_data' => json_encode($data),'user_id' => json_encode($user_id)]);
    }
}
