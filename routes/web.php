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


Route::get('/',[MainController::class,'dashboard'])->name('dashboard');
Route::post('/',[MainController::class,'getCityName'])->name('city.submit');


Route::view('login','login')->name('login.form');
Route::post('login',[MainController::class,'login'])->name('login.submit');


Route::view('register','ragister')->name('register.form');
Route::post('register',[MainController::class,'register'])->name('register.submit');


Route::view('about','about')->name('about');
Route::view('terms','terms')->name('terms');
Route::view('contact','contact_us')->name('contact');


Route::get('/logout', [MainController::class, 'logout'])->name('logout');
