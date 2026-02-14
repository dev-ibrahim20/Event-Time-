<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductsController extends Controller
{
    public function index(Request $request)
    {
        // Get all products with filtering and sorting
        $query = Product::where('status', true);
        
        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_ar', $request->category)
                  ->orWhere('category_en', $request->category);
        }
        
        // Sort products
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        
        if ($sortBy == 'price') {
            $query->orderBy('price', $sortOrder);
        } elseif ($sortBy == 'name') {
            $query->orderBy(app()->getLocale() === 'ar' ? 'title_ar' : 'title_en', $sortOrder);
        } else {
            $query->orderBy($sortBy, $sortOrder);
        }
        
        $products = $query->paginate(12);
        
        // Get all unique categories for filter
        $categories = Product::where('status', true)
            ->whereNotNull('category_ar')
            ->where('category_ar', '!=', '')
            ->distinct()
            ->pluck(app()->getLocale() === 'ar' ? 'category_ar' : 'category_en')
            ->filter();
        
        // Featured products
        $featuredProducts = Product::where('status', true)
            ->where('featured', true)
            ->take(6)
            ->get();
        
        return view('products', compact('products', 'categories', 'featuredProducts'));
    }
    
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();
        
        // Related products (same category)
        $relatedProducts = Product::where('status', true)
            ->where('id', '!=', $product->id)
            ->where(function($query) use ($product) {
                $query->where('category_ar', $product->category_ar)
                      ->orWhere('category_en', $product->category_en);
            })
            ->take(4)
            ->get();
        
        // Latest products
        $latestProducts = Product::where('status', true)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();
        
        return view('product-detail', compact('product', 'relatedProducts', 'latestProducts'));
    }
}
