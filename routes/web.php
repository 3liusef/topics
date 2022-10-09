<?php

use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\LikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\TopicController ;
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

Route::get('/', [App\Http\Controllers\HomeController::class,'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


route::group(['middleware' => 'auth' ], function() {
    Route::resource('/topic' , TopicController::class);
    Route::resource( 'comment' , CommentController::class) ;
    Route::get( 'topic/{id}/unlike' , [LikeController::class ,'unlike']);
    Route::get( 'topic/{id}/like' , [LikeController::class ,'like']);

}  ) ;



