<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('/admin', App\Http\Controllers\AdminController::class);
Route::post('/admin/login', [App\Http\Controllers\AdminController::class,'login'])->name('admin.login');
////------------ guard admin middleware start------------------------------------------------
Route::view('/blogPgi', "blogPagi");
Route::group(['middleware'=>['auth:admin']],function(){
    Route::get(/*'/admin/logout'/* not work say not found, so i use another name*/
   '/adminlogout', [App\Http\Controllers\AdminController::class,'logout'])->name('admin.logout');
});
////------------ guard admin middleware end------------------------------------------------
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/category', "App\Http\Controllers\CategoryController");
Route::resource('/blog', "App\Http\Controllers\BlogController");
Route::view('/vue', "vueCom");

Route::get('/add/{name}', "App\Http\Controllers\addController@add");
Route::get('/addno', "App\Http\Controllers\addController@cartNo");
Route::get('/sms', function(){
    // $err=sms(8622910920,45465);
    // if(!$err){                 //  fast2sms work
    //     echo "sms send";
    // }
                                     
    // echo Auth()->user();
    echo "env o =".env('o');
    echo "<br>";
    echo "env l =".$_ENV['l'];
});
