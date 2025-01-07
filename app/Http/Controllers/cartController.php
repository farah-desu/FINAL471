<?php

namespace App\Http\Controllers;


use App\Models\My_user;
use Illuminate\Http\Request;
use App\Models\Shopping_cart;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function add_to_cart(Request $request)
{   
    //Find the cart_id using user_id
    $cart = Shopping_cart::where('user_id', $request->user_id)->first(); //user_id every page saved in app
    $cart_id = $cart->id ;
    // Check if the product is already in the cart (by checking cart_id and product_id)
    $existingItem = DB::table('added_tos')
        ->where('cart_id', $cart_id)
        ->where('product_id', $request->product_id)
        ->first();

    if ($existingItem) {
        // If the product is already in the cart, return a message
        return back()->with('message', 'This product is already in your cart.');
    }

    // If the product is not already in the cart, insert the new item
    DB::table('added_tos')->insert([
        'cart_id' => $cart_id,
        'product_id' => $request->product_id,
    ]);

    //Return a success message after adding the item
    return back()->with('message', 'Product added to cart successfully!');
}

public function index(Request $request)
{
    $user_id = $request->user_id; // Get the user ID

    // Get the cart for the user
    $cart = DB::table('carts')->where('user_id', $user_id)->first();
    $cart_id = $cart->id;

    // Fetch products from the added_tos table
    $data = DB::table('added_tos')
        ->join('features', 'added_tos.product_id', '=', 'features.id')
        ->where('added_tos.cart_id', $cart_id)
        ->select('features.*')
        ->get();

    return view('cart', ['json_data' => json_encode($data),'user_id'=>json_encode($user_id) ]);
}



    public function removeFromCart(Request $request)
{   $user_id = $request->user_id;
    // Find the cart_id using user_id
    $cart = Shopping_cart::where('user_id', $request->user_id)->first();
    $cart_id = $cart ? $cart->id : null;

    // If no cart exists, return an error message
    if (!$cart_id) {
        return back()->with('message', 'Cart not found.');
    }

    // Remove the item from the added_tos table
    DB::table('added_tos')
        ->where('cart_id', $cart_id)
        ->where('product_id', $request->product_id)
        ->delete();

    $data = DB::table('added_tos')
        ->join('features', 'added_tos.product_id', '=', 'features.id') 
        ->where('added_tos.cart_id', $cart_id)
        ->select('features.*') 
        ->get();
    // Return a success message after removing the item
    return view("cart",['json_data' => json_encode($data),'user_id'=>json_encode($user_id )]);
}
public function clearAll(Request $request){
    $user_id = $request->user_id; //user found
    $cart =DB::table('carts')
        ->where('user_id', $user_id)
        ->select('*') 
        ->first(); //get() not wrking
    $cart_id = $cart->id;

    DB::table('added_tos')
        ->where('cart_id', $cart_id)
        ->delete();
    return back();
}

}
