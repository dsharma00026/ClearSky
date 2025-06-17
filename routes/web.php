<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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


Route::get('/',[MainController::class,'dashboard']);


Route::view('login','login');
Route::post('login',[MainController::class,'login']);


Route::view('ragister','ragister');
Route::post('ragister',[MainController::class,'ragister']);


Route::view('about','about');
Route::view('terms','terms');
Route::view('contact','contact_us');


Route::get('/logout', [MainController::class, 'logout'])->name('logout');
