<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactMessagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
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




Route::get('/', [HomeController::class, 'index'])->name('home');

// Language switch route
Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('language.switch');

// Frontend Routes
    Route::get('services', function () {
        return view('services');
    })->name('services');
    
    Route::get('about', function () {
        return view('about');
    })->name('about');
    
    Route::get('contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('contact', [ContactMessagesController::class, 'store'])->name('contact.submit');
    
    Route::get('gallery', function () {
        return view('gallery');
    })->name('gallery');
    
    Route::get('quote', function () {
        return view('quote');
    })->name('quote');








Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Start Services Routes
    Route::get('/admin-services/create', [ServicesController::class, 'create'])->name('admin-services.create');
    Route::post('/admin-services', [ServicesController::class, 'store'])->name('admin-services.store');
    Route::resource('admin-services', ServicesController::class)->except(['create', 'store']);

    Route::get('/admin-contact-messages', [ContactMessagesController::class, 'index'])->name('admin-contact-messages.index');
    Route::delete('/admin-contact-messages/{id}', [ContactMessagesController::class, 'destroy'])->name('admin-contact-messages.destroy');

});

require __DIR__.'/auth.php';