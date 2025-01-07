<?php

use App\Http\Controllers\api1;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\featuresController;
use App\Http\Controllers\ProfileEditController;



Route::get('/', function () {
    return view('login'); 
});
//login
Route::post('/login_home', [loginController::class, 'logIn']);

//for in correct pass
Route::get('/login', function () {
    return view('login'); 
});
//sign up
Route::get('/signup', function () {
    return view('signup'); 
});
Route::post('/signup', [loginController::class, 'signUp']);


// For Web Routes (show reviews)
Route::get('/review_22301483', [reviewController::class, 'showReviews']);

// For API Routes (insert review)
Route::post('/review_22301483', [reviewController::class, 'insertReview']);

Route::get('/home', [homeController::class, 'index']);


//cart
Route::post('/cart_22301483', [cartController::class, 'index']);
Route::post('/add_to_cart', [cartController::class, 'add_to_cart']);
Route::post('/remove-from-cart', [cartController::class, 'removeFromCart']);


//features

Route::get('/profilePic', [featuresController::class, 'profile_pic']);
Route::get('/wallpaper', [featuresController::class, 'wallpaper']);
Route::get('/music', [featuresController::class, 'music']);
// Route::get('/book', [bookController::class, 'index']);
Route::get('/start_book_22301483', [bookController::class, 'start_book']);
Route::post('/confirm_book', [bookController::class, 'confirm_book']);

//profile
Route::get('/profile', [profileController::class, 'index']);
Route::post('/profileUpdate', [profileController::class, 'changeProfilePic']);


//changes 
Route::post("/api/update-points",[api1::class,'updateUserPoints']);




//kousiks
Route::get("/index",[api1::class,'index']);
Route::get('/insert_currency/{amount}/{id}', [api1::class, 'insert_currency'])->name('insert.currency');

Route::get("/userdata/{id?}",[api1::class,'getuser']);



Route::get("/music/{id?}",[api1::class,'getmusic']);

Route::get("/wallpaper/{id?}",[api1::class,'getwallpaper']);

Route::get('/get-quote', [api1::class, 'getQuote']);

Route::get('/get-tip', [api1::class, 'gettip']);

Route::get('/changewall', [api1::class, 'changewall']);



//farah


Route::post('/note_add', [NoteController::class, 'add']);
Route::get('/note', [NoteController::class, 'show']);
Route::post('/todo_add', [TodoController::class, 'add']);
Route::get('/todo', [TodoController::class, 'show']);



Route::get('/profileEdit', [ProfileEditController::class, 'edit']);


Route::get('/logout', function () {
    return view('login'); 
});

Route::get('/dashboard', [homeController::class, 'dash']);
// Route::get('/note', [homeController::class, 'note']);
// Route::get('/profile', [homeController::class, 'profile']);
