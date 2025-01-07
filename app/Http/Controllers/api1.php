<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
use App\Models\quotes;

class api1 extends Controller
{   
    public function insert_currency($value, $id)
    {
        // Get the current balance of the user
        $currentbal = intval(DB::table('my_users')->where('id', $id)->value('points'));

        if (is_null($currentbal)) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update the balance for the given user ID
        DB::table('my_users')->where('id', $id)->update([
            'points' => $currentbal + intval($value),
        ]);

        return response()->json([
            'message' => 'Balance updated successfully!',
            'new_balance' => $currentbal + intval($value),
        ]);
    }
    
public function index(Request $request){
    $user_id = $request->user_id;
    // Fetch product images for musics
    $musics = DB::table('user_features')
    ->join('music', 'music.id', '=', 'user_features.feature_id')
    ->join('features', 'features.id', '=', 'music.id') // Assuming features also links to user_features
    ->select('features.product_image')
    ->where('user_features.user_id', '=', $user_id)
    ->distinct()
    ->get();
    $default_music=DB::table('default_music')
    ->select("*")
    ->get(); 
    
    // Fetch product images for wallpapers
    $wallpapers = DB::table('user_features')
    ->join('wallpapers', 'wallpapers.id', '=', 'user_features.feature_id')
    ->join('features', 'features.id', '=', 'wallpapers.id') // Assuming features also links to user_features
    ->select('features.product_image')
    ->where('user_features.user_id', '=', $user_id)
    ->distinct()
    ->get();
    $default_wallpaper=DB::table('default_wallpaper')
    ->select("*")
    ->get(); 

    $current = DB::table('my_users')
            ->where('id', $user_id)
            ->value('wallpaper'); // Returns a single value
    $pp = DB::table('my_users')
            ->where('id', $user_id)
            ->value('profile_pic');
    $mail = DB::table('my_users')
            ->where('id', $user_id)
            ->value('email');

    return view("index",['wallpaper' => $current,'wallpapers'=>$wallpapers,'musics'=>$musics,'user_id'=>$user_id,'profile_pic'=>$pp,"mail"=>$mail,'default_wallpaper' =>$default_wallpaper,'default_music'=>$default_music]);

}
    
    public function changewall(Request $request){
    $user_id = $request->user_id; // Retrieve the currently logged-in user's ID
    $wallname = $request->wallname;
    if ($user_id) {
        DB::table('my_users')
            ->where('id', $user_id)
            ->update(['wallpaper' => $wallname]);
        return back();
    }
    }
    public function gettip()
{
    // Fetch all study tips from the 'tips' table
    $tips = DB::select("SELECT study_tips FROM tips");

    // Check if any tips are available
    if (count($tips) > 0) {
        // Pick a random tip
        $key = array_rand($tips);
        $randtip = $tips[$key]->study_tips;

        // Return the tip as JSON
        return response()->json([
            'success' => true,
            'tip' => $randtip,
        ]);
    }

    // Handle the case when no tips are found
    return response()->json([
        'success' => false,
        'message' => 'No tips found.'
    ], 404);
}


    
    public function getQuote()
    {
        // Fetch all quotes and authors
        $quotes = DB::select("SELECT quote, author FROM quotes");

        // Check if quotes exist
        if (count($quotes) > 0) {
            // Pick a random key
            $key = array_rand($quotes);

            // Access the random quote and author
            $randomQuote = $quotes[$key]->quote;
            $randomAuth = $quotes[$key]->author;

            // Return response as JSON
            return response()->json([
                'success' => true,
                'quote' => $randomQuote,
                'author' => $randomAuth
            ]);
        }

        // Handle case when no quotes are available
        return response()->json([
            'success' => false,
            'message' => 'No quotes found.'
        ], 404);
    }


    function insertuser($id,$name,$email,$pass){
        DB::insert("insert into users (id,name,email,password) values(?, ?, ?, ?)",[$id,$name,$email,$pass]);
    }

    function insertmusic($musics){
        DB::insert("insert into music musics=?",[$musics]);
    }

    function insertwallpaer($wallpapers){
        DB::insert("insert into wallpaper wallpapers=?",[$wallpapers]);
    }
    
    function insertnotes($content){
        DB::insert("insert into notes content=?",[$content]);
    }

    function getuser($id=null){
        $all=DB :: select("select * from users");
        $part=DB :: select("select * from users where id='$id'");
        return $id==="all"? $all : $part;     
    }

    function getnotes($id=null){
        $all= DB:: select("select id, content from notes");
        $note= DB:: select("select content from notes where id='$id'");
        return $id==='all'?$all:$note;
    }


    function getmusic($id=null){
        $all= DB:: select("select id, musics from music");
        $music= DB:: select("select musics from music where id='$id'");
        return $id==='all'?$all:$music;
    }
    
    function getwallpaper($id=null){
        $all= DB:: select("select id, wallpapers from wallpaper");
        $wallpaper= DB:: select("select wallpapers from wallpaper where id='$id'");
        return $id==='all'?$all:$wallpaper;
    }
}
