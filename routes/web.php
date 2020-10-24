<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('post');
// });
Route::get('/',[NavController::class, 'home']);
Route::get('/dashboard',[NavController::class, 'dashboard']);
Route::post('/post-submit',[PostController::class, 'addPost'])->name('add.post');
Route::get('/profile',[NavController::class, 'profile']);
Route::get('/posts/view/{id}',[PostController::class, 'viewPostID']);
Route::get('/view/edit/{id}',[PostController::class, 'viewEditPostID']);
Route::get('/posts/delete/{id}',[PostController::class, 'deletePostID']);
Route::post('/posts/edit/{id}',[PostController::class, 'editPostID']);
Route::get('/cancel/update',[PostController::class, 'cancelUpdate']);
Route::post('/comments/submit', [CommentsController::class, 'commentsSubmit'])->name('submit.comments');


