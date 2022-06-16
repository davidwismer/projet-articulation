<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MyAuthController;

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



//création des différentes routes

Route::get('/', [DataController::class,'index']);

Auth::routes();

Route::post('/mylogin', [MyAuthController::class,'login']);

Route::get('/isLogged', [MyAuthController::class,'isLogged']);

Route::get('/logout', [MyAuthController::class,'deconnexion']);