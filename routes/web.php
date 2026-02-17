<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminCareersController;
use App\Http\Controllers\AdminOffersController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminStaticContentsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactMessagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PapersController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteRequestsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TeamMemberController;
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

    Route::get('quote', [QuoteRequestsController::class, 'create'])->name('quote');
    
    Route::get('service-details/{service}', function ($service) {
        $service = \App\Models\Service::where('slug', $service)->first();
        if (!$service) {
            abort(404);
        }
        return view('service-details', compact('service'));
    })->name('service-details');
    
    Route::post('quote-request', [QuoteRequestsController::class, 'store'])->name('quote-request.submit');

    Route::post('api/quote-request', [QuoteRequestsController::class, 'store']);

    // Products Routes
    Route::get('products', [FrontendProductsController::class, 'index'])->name('products.index');
    Route::get('products/{slug}', [FrontendProductsController::class, 'show'])->name('products.show');








Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin-dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('admin-dashboard');

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

    Route::get('/admin-quote-requests', [QuoteRequestsController::class, 'index'])->name('admin-quote-requests.index');
    Route::post('/admin-quote-requests/{id}/toggle', [QuoteRequestsController::class, 'toggle'])->name('admin-quote-requests.toggle');
    Route::delete('/admin-quote-requests/{id}', [QuoteRequestsController::class, 'destroy'])->name('admin-quote-requests.destroy');

    Route::get('/admin-social-media', [SocialMediaController::class, 'index'])->name('admin-social-media.index');
    Route::get('/admin-social-media/create', [SocialMediaController::class, 'create'])->name('admin-social-media.create');
    Route::post('/admin-social-media', [SocialMediaController::class, 'store'])->name('admin-social-media.store');
    Route::get('/admin-social-media/{socialMedia}/edit', [SocialMediaController::class, 'edit'])->name('admin-social-media.edit');
    Route::put('/admin-social-media/{socialMedia}', [SocialMediaController::class, 'update'])->name('admin-social-media.update');
    Route::delete('/admin-social-media/{socialMedia}', [SocialMediaController::class, 'destroy'])->name('admin-social-media.destroy');

    Route::get('/admin-team-members', [TeamMemberController::class, 'index'])->name('admin-team-members.index');
    Route::get('/admin-team-members/create', [TeamMemberController::class, 'create'])->name('admin-team-members.create');
    Route::post('/admin-team-members', [TeamMemberController::class, 'store'])->name('admin-team-members.store');
    Route::get('/admin-team-members/{teamMember}/edit', [TeamMemberController::class, 'edit'])->name('admin-team-members.edit');
    Route::put('/admin-team-members/{teamMember}', [TeamMemberController::class, 'update'])->name('admin-team-members.update');
    Route::delete('/admin-team-members/{teamMember}', [TeamMemberController::class, 'destroy'])->name('admin-team-members.destroy');

    Route::get('/admin-clients', [ClientController::class, 'index'])->name('admin-clients.index');
    Route::get('/admin-clients/create', [ClientController::class, 'create'])->name('admin-clients.create');
    Route::post('/admin-clients', [ClientController::class, 'store'])->name('admin-clients.store');
    Route::get('/admin-clients/{client}/edit', [ClientController::class, 'edit'])->name('admin-clients.edit');
    Route::put('/admin-clients/{client}', [ClientController::class, 'update'])->name('admin-clients.update');
    Route::delete('/admin-clients/{client}', [ClientController::class, 'destroy'])->name('admin-clients.destroy');

    Route::get('/admin-portfolios', [PortfolioController::class, 'index'])->name('admin-portfolios.index');
    Route::get('/admin-portfolios/create', [PortfolioController::class, 'create'])->name('admin-portfolios.create');
    Route::post('/admin-portfolios', [PortfolioController::class, 'store'])->name('admin-portfolios.store');
    Route::get('/admin-portfolios/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('admin-portfolios.edit');
    Route::put('/admin-portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('admin-portfolios.update');
    Route::delete('/admin-portfolios/{portfolio}', [PortfolioController::class, 'destroy'])->name('admin-portfolios.destroy');

    Route::get('/admin-about-us', [AboutUsController::class, 'index'])->name('admin-about-us.index');
    Route::get('/admin-about-us/edit', [AboutUsController::class, 'edit'])->name('admin-about-us.edit');
    Route::put('/admin-about-us', [AboutUsController::class, 'update'])->name('admin-about-us.update');

    Route::get('/admin-papers', [PapersController::class, 'index'])->name('admin-papers.index');
    Route::post('/admin-papers', [PapersController::class, 'update'])->name('admin-papers.update');
    Route::delete('/admin-papers/{papers}', [PapersController::class, 'destroy'])->name('admin-papers.destroy');

    // Offers Routes
    Route::resource('admin-offers', AdminOffersController::class);

    // Careers Routes
    Route::resource('admin-careers', AdminCareersController::class);

    // Products Routes
    Route::resource('admin-products', AdminProductsController::class);

    // Social Media Routes
    Route::get('/admin-social-media', [SocialMediaController::class, 'index'])->name('admin-social-media.index');
    Route::get('/admin-social-media/create', [SocialMediaController::class, 'create'])->name('admin-social-media.create');
    Route::post('/admin-social-media', [SocialMediaController::class, 'store'])->name('admin-social-media.store');
    Route::get('/admin-social-media/{socialMedia}/edit', [SocialMediaController::class, 'edit'])->name('admin-social-media.edit');
    Route::put('/admin-social-media/{socialMedia}', [SocialMediaController::class, 'update'])->name('admin-social-media.update');
    Route::delete('/admin-social-media/{socialMedia}', [SocialMediaController::class, 'destroy'])->name('admin-social-media.destroy');

    // Static Contents Routes
    Route::get('/admin-static-contents', [AdminStaticContentsController::class, 'index'])->name('admin-static-contents.index');
    Route::post('/admin-static-contents', [AdminStaticContentsController::class, 'update'])->name('admin-static-contents.update');
    Route::get('/admin-static-contents/create-default', [AdminStaticContentsController::class, 'createDefaultContent'])->name('admin-static-contents.create-default');
    Route::delete('/admin-static-contents/{content}', [AdminStaticContentsController::class, 'destroy'])->name('admin-static-contents.destroy');
});

require __DIR__.'/auth.php';