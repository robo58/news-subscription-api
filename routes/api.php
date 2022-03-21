<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/websites/{website}/create_post', [\App\Http\Controllers\PostController::class, 'createPost']);
Route::post('/websites/{website}/subscribe', [\App\Http\Controllers\SubscriberController::class, 'subscribeToWebsite']);

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'getPosts']);
Route::get('/subscribers', [\App\Http\Controllers\SubscriberController::class, 'getSubscribers']);
Route::get('/websites', [\App\Http\Controllers\WebsiteController::class, 'getWebsites']);
