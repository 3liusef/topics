<?php

use App\Http\Controllers\Api\TopicApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return User::get() ;
});*/


Route::group(['middleware'=>'auth:api'],function() {
    Route::get('topic', [TopicApiController::class,'index'] ) ;
    Route::get('topic/{id}', [TopicApiController::class,'show'] ) ;
    Route::get('topic-with-comments/{id}', [TopicApiController::class,'topicWithComments'] ) ;
    Route::post('topic', [TopicApiController::class,'store'] ) ;
    Route::get('user/{id}', [UserApiController::class ,'show'] ) ;

})  ;


