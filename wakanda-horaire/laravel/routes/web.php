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

<<<<<<< HEAD
Route::get('test', function() {
    return view('App');
=======
Route::get('/hello', function () {
    return 'hello';
>>>>>>> ec5ca43794ceed4c84a64b9fb6c971cd3294d22e
});