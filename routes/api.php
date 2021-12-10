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

Route::get('/',function(Request $request) {
    return response()->json("you are invalid user",401);
});
Route::get('/saveCookies',function(Request $request) {
    return response()->json("you are invalid user")->withCookie(cookie('name', 'virat', 60));
});
Route::get('/getCookie',function(Request $request) {
    return $request->cookie('name');
});