<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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
Route::prefix("admin")->group(function(){
    ///prefix group 
});

Route::group(["middleware"=>["first"]],function(){
    //
});

Route::group(["prefix"=>"admin"],function(){
    //
});
Route::get('test',[TestController::class,"index"]);
