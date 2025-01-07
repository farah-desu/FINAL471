<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    public function index(Request $request)
{
    $user_id = $request->user_id;

    // Get user's unlocked feature IDs
    $feature_ids = DB::table('user_features')
        ->where('user_id', $user_id)
        ->pluck('feature_id'); // Pluck returns an array of IDs

    // Get details of features unlocked by the user
    $data = DB::table('features')
        ->whereIn('id', $feature_ids) // Get features where ID is in the user's unlocked features
        ->select('*')
        ->get();

    // Get user information
    $user_info = DB::table('my_users')
        ->where('id', $user_id)
        ->first(); // Fetch single user info

    // Get profile pictures for the unlocked features
    $profile_pics = DB::table('profile_pics')
        ->join('features', 'features.id', '=', 'profile_pics.id')
        ->whereIn('features.id', $feature_ids)  // Ensure that the profile pics are linked to unlocked features
        ->select('*')
        ->distinct()  
        ->get();

    return view('profile', [
        'data' => json_encode($data),
        'user_id' => json_encode($user_id),
        'user_info' => json_encode($user_info),
        'profile_pics' => json_encode($profile_pics)
    ]);
}
public function changeProfilePic(Request $request)
{
    $user_id = $request->user_id;
    $selected_profile_pic = $request->profile_pic;

    // Update 
    DB::table('my_users')
        ->where('id', $user_id)
        ->update(['profile_pic' => $selected_profile_pic]);

    return back();
}

}
