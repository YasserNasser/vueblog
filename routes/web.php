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

// Route::get('/admin', function () {
//     return view('admin.index');
// });
// Route::get('/', function () {
//     return view('front.index');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('{any}',function($any){
return view('front.index');
})->where('any','.*');
