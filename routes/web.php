<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

// Language switch route
Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('language.switch');

// Frontend Routes
Route::group(['middleware' => 'web'], function() {
    Route::get('services', function () {
        return view('services');
    })->name('services');
    
    Route::get('about', function () {
        return view('about');
    })->name('about');
    
    Route::get('contact', function () {
        return view('contact');
    })->name('contact');
    
    Route::get('gallery', function () {
        return view('gallery');
    })->name('gallery');
    
    Route::get('quote', function () {
        return view('quote');
    })->name('quote');
});
