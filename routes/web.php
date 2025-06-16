<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('dashboard');
});

Route::view('login','login');
Route::post('login',[AuthController::class,'login']);


Route::view('ragister','ragister');
Route::post('ragister',[AuthController::class,'ragister']);


Route::view('about','about');
Route::view('terms','terms');
Route::view('contact','contact_us');
