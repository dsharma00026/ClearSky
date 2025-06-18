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


// Dashboard and Weather Routes
Route::controller(MainController::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::post('/', 'getCityName')->name('city.submit');
    Route::get('/logout', 'logout')->name('logout');
});

// Auth Routes (Login/Register)
Route::controller(MainController::class)->group(function () {
    Route::view('login', 'login')->name('login.form');
    Route::post('login', 'login')->name('login.submit');
});

Route::controller(MainController::class)->group(function () {
    Route::view('register', 'ragister')->name('register.form');
    Route::post('register', 'register')->name('register.submit');
});



//Contact us page
Route::controller(MainController::class)->group(function (){
    Route::view('contact','contact_us')->name('contact_us.form');
    Route::post('contact','contact')->name('contact_us.submit');

});


// Static Pages
Route::view('about', 'about')->name('about');
Route::view('terms', 'terms')->name('terms');
