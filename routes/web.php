<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\WelcomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Basic Routing
Route::get('/hello', function () {
    return 'Hello, World!';
});

// Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/world', function () {
    return  'World';
});

Route::get('/', function () {
    return 'Selamat Datang';
});

Route::get('/about', function () {
    return 'NIM : 2341720222<br>Name : Ridho Anfaal';
});

// Route Parameters
Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

Route::get('/articles/{id}', function ($articleId) {
    return 'Halaman Artikel dengan ID-'.$articleId;
});

// Optional Parameters
Route::get('/user/{name?}', function ($name=null) {
    return 'Nama saya '.$name;
});

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});

// Route Name
Route::get('/user/profile', function () {
    //
})->name('profile');

// Route Group & Route Prefixes
// Route Group 
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses the first & second middleware...
    });

    Route::get('/user/profile', function () {
        // Uses the first & second middleware...
    });
});

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

// //Route Prefixes
Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

// Redirect Routes
Route::redirect('/here', '/there');

// View Routes
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

