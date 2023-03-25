<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\showVideoController;
use App\Http\Controllers\studentsVideoController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//for admin
Route::resource('categories',  CategoryController::class);
Route::resource('videos',  VideoController::class);
Route::put('videoss/{video}',  [VideoController::class, 'update'])->name('videoss');
Route::resource('users', UserController::class);
//end of admin

//for student
Route::get('/layout', function(){
 return view('frontend.categories');
});
//for student

Route::get('get-firebase-data', [FirebaseController::class, 'index'])->name('firebase.index');

Route::patch('/fcm-token', [HomeController::class, 'updateToken'])->name('fcmToken');
Route::post('/send-notification',[HomeController::class,'notification'])->name('notification');

/* for show videos in categories blade */
Route::get('/showVideo/{category}',[showVideoController::class,'index'])->name('showVideo');

/* student video blade */
Route::get('/studentsVideo/{category}/{video}',[studentsVideoController::class,'index'])->name('studentsVideo');
