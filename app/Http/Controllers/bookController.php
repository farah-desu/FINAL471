<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    public function confirm_book(Request $request)
    {
        $user_id = $request->user_id; //user found
        $amount = $request->amount; //user found
        $email= $request->email;
        //Retrieve the user's points from the database
        $user = DB::table('my_users')
            ->where('id', $user_id)
            ->select('*')
            ->first(); // Use first() to get the first row
        if ($user->email!=$email){
            return back()->with('error', 'Eamil not found.');
        }

        // Get the cart for the user
        $cart = DB::table('carts')->where('user_id', $user_id)->first();
        $cart_id = $cart->id;
        // //user already has it
        $product=DB::table('added_tos')
            ->where('cart_id', $cart_id)
            ->pluck('product_id');

        $features = DB::table('user_features')
            ->where('user_id', $user_id)
            ->whereIn('feature_id', $product)
            ->select('*')
            ->get();
        if ($features->count() > 0) {
            return back()->with('error', 'Already purchased.');
        }
        // // Check if the user's points are enough
        if ($user && $amount > $user->points) {
            return back()->with('error', 'Not enough points for this purchase.');
        }

        // Deduct points from the user
        DB::table('my_users')
            ->where('id', $user_id)
            ->update([
                'points' => $user->points - $amount,  // Deduct points
            ]);
        //insert to books table
        DB::table('books')->insert([
                'user_id' => $user_id,
                'amount' => $amount,
        ]);
        //add info user tables 
        $user_id = $request->user_id; //user found
        $cart =DB::table('carts')
            ->where('user_id', $user_id)
            ->select('*') 
            ->first(); //get() not wrking

        //insert features to user_features table 
        $product=DB::table('added_tos')
            ->where('cart_id', $cart_id)
            ->select('product_id')
            ->get();
        foreach ($product as $i) {
            $product_id = $i->product_id;
            // DB:: select('Insert into user_features values ("$user_id","$"product_id)');
            DB::table('user_features')->insert([
                'user_id' => $user_id,
                'feature_id' => $product_id
            ]);
        }

        //delete all from added_tos after booking for specific user for that we need cart_id using user_id

        DB::table('added_tos')
        ->where('cart_id', $cart_id)
        ->delete();
        // Pass the amount and user_id to the view
        return view('thank_you', ['user_id' =>json_encode( $user_id)]);
    }

    public function start_book(Request $request)
    {
        $user_id = $request->query('user_id'); 
        $amount = $request->query('amount'); 
        return view('book', ['amount' => json_encode($amount), 'user_id' => json_encode($user_id)]);
    }
}
