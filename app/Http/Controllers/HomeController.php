<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Product;
use App\Models\Career;
use App\Models\Offer;
use App\Models\StaticContent;

class HomeController extends Controller
{
    public function index()
    {
        // Get data for dashboard
        $servicesCount = Service::count();
        $productsCount = Product::count();
        $careersCount = Career::count();
        $offersCount = Offer::count();
        $services = Service::where('featured', true)->take(4)->get();
        
        // Get recent activities
        $recentServices = Service::latest()->take(5)->get();
        $recentProducts = Product::latest()->take(5)->get();
        $recentCareers = Career::latest()->take(5)->get();
        $recentOffers = Offer::latest()->take(5)->get();
        
        // Get featured products for home page
        $featuredProducts = Product::where('status', true)
            ->where('featured', true)
            ->take(8)
            ->get();
        
        // Get static content for home page
        $homeImage = StaticContent::getHomeImage();
        $phone = StaticContent::getPhone();
        $email = StaticContent::getEmail();
        $address = StaticContent::getAddress();
        $details = StaticContent::getDetails();
        
        return view('home', compact(
            'servicesCount', 
            'productsCount', 
            'careersCount', 
            'offersCount',
            'recentServices',
            'recentProducts', 
            'recentCareers', 
            'recentOffers',
            'featuredProducts',
            'homeImage',
            'phone',
            'email',
            'address',
            'details',
            'services'
        ));
    }
}