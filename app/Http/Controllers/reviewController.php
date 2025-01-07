<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reviewController extends Controller
{
   
    public function insertReview(Request $request)
    {
        // Retrieve review data from the request
        $comment = $request->comment;
        $star = $request->star; 
        $name = $request->name; 

        // Check if a review with the same name, comment, and star already exists
        $existingReview = DB::table('reviews')
            ->where('name', $name)
            ->where('comment', $comment)
            ->where('star', $star)
            ->first();

        // If no existing review, insert the new one
        if (!$existingReview && $comment && $star) {
            DB::table('reviews')->insert([
                'name' => $name,
                'comment' => $comment,
                'star' => $star,
            ]);
        }
        return back()->with('message', 'Review added successfully!');;
        
    }

  
    public function showReviews(Request $request)
    { 
        // Fetch all reviews
        $user_id = $request->user_id; 
        $data = DB::table('reviews')->select('*')->get();
        return view('review', ['json_data' => json_encode($data), 'user_id' => json_encode($user_id)]);
    }
}
