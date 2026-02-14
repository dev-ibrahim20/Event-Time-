@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'منتجاتنا - وقت الحدث' : 'Our Products - Event Time')
@section('description', app()->getLocale() == 'ar' ? 'استكشف مجموعة منتجاتنا عالية الجودة لتجهيز الفعاليات والمؤتمرات والمعارض' : 'Explore our high-quality product collection for event, conference, and exhibition setup')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-red-600 to-red-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'منتجاتنا' : 'Our Products' }}
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-3xl mx-auto leading-relaxed">
                {{ app()->getLocale() == 'ar' ? 'مجموعة مختارة من أفضل المنتجات لتجهيز فعالياتكم بمعايير عالمية' : 'A curated collection of the finest products for your events with world-class standards' }}
            </p>
        </div>
    </div>
    
    <!-- Decorative Elements -->
    <div class="absolute top-10 right-10 w-20 h-20 bg-white opacity-10 rounded-full"></div>
    <div class="absolute bottom-10 left-10 w-32 h-32 bg-white opacity-5 rounded-full"></div>
</section>

<!-- Advanced Filters Section -->
@include('partials.products-filters')

<!-- Featured Products -->
@if($featuredProducts->count() > 0)
<section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center bg-red-600 text-white px-6 py-3 rounded-full mb-4">
                <i class="fas fa-star mr-2"></i>
                <span class="font-bold text-lg">{{ app()->getLocale() == 'ar' ? 'المنتجات المميزة' : 'Featured Products' }}</span>
                <i class="fas fa-star ml-2"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'اختياراتنا المميزة بعناية' : 'Our Carefully Selected Premium Options' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                {{ app()->getLocale() == 'ar' ? 'اكتشف أفضل منتجاتنا التي تم اختيارها بعناية فائقة لتلبية جميع احتياجات فعالياتكم' : 'Discover our finest products carefully selected with premium quality to meet all your event needs' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
            <div class="group relative bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-red-200 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <!-- Featured Badge -->
                <div class="absolute -top-4 -right-4 z-10">
                    <div class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-full shadow-lg flex items-center">
                        <i class="fas fa-star mr-2"></i>
                        <span class="font-bold text-sm">{{ app()->getLocale() == 'ar' ? 'مميز' : 'Featured' }}</span>
                    </div>
                </div>
                
                <!-- Product Image -->
                <div class="relative h-64 bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
                    @if($product->image)
                    <img src="{{ asset( $product->image) }}" 
                         alt="{{ app()->getLocale() == 'ar' ? $product->title_ar : $product->title_en }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-red-50 to-red-100">
                        <i class="fas fa-crown text-red-300 text-6xl"></i>
                    </div>
                    @endif
                    
                    <!-- Overlay on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-center pb-6">
                        <div class="text-center">
                            <div class="text-white font-bold text-lg mb-2">{{ app()->getLocale() == 'ar' ? $product->title_ar : $product->title_en }}</div>
                            <div class="text-3xl font-bold">{{ number_format($product->price, 2) }} {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}</div>
                        </div>
                    </div>
                </div>
                
                <!-- Product Content -->
                <div class="p-6">
                    <!-- Category & Rating -->
                    <div class="flex items-center justify-between mb-4">
                        @if($product->category_ar || $product->category_en)
                        <span class="inline-flex items-center px-3 py-1 bg-red-50 text-red-600 text-sm font-medium rounded-lg">
                            <i class="fas fa-tag mr-1"></i>
                            {{ app()->getLocale() == 'ar' ? $product->category_ar : $product->category_en }}
                        </span>
                        @endif
                        <div class="flex items-center text-yellow-500">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-red-600 transition-colors">
                        {{ app()->getLocale() == 'ar' ? $product->title_ar : $product->title_en }}
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                        {{ app()->getLocale() == 'ar' ? Str::limit($product->description_ar, 100) : Str::limit($product->description_en, 100) }}
                    </p>
                    
                    <!-- Price & CTA -->
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <div class="text-2xl font-bold text-red-600 mb-1">
                                {{ number_format($product->price, 2) }} {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}
                            </div>
                            <div class="text-sm text-green-600 font-medium flex items-center">
                                <i class="fas fa-check-circle mr-1"></i>
                                {{ app()->getLocale() == 'ar' ? 'متاح للتوصيل الفوري' : 'Available for Immediate Delivery' }}
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <a href="{{ route('products.show', $product->slug) }}" class="flex-1 bg-gradient-to-r from-red-600 to-red-700 text-white px-4 py-2 rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 transform hover:scale-105 shadow-lg font-medium text-sm flex items-center group">
                                <i class="fas fa-shopping-bag mr-1 transition-transform duration-300 group-hover:translate-x-1"></i>
                                <span>{{ app()->getLocale() == 'ar' ? 'تفاصيل المنتج' : 'Product Details' }}</span>
                                <i class="fas fa-arrow-left ml-1 transition-transform duration-300 group-hover:translate-x-0"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Filters and Products -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24 border border-gray-100">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-filter text-red-600 mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-900">
                            {{ app()->getLocale() == 'ar' ? 'تصفية المنتجات' : 'Filter Products' }}
                        </h3>
                    </div>
                    
                    <!-- Category Filter -->
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-tag text-red-500 mr-2"></i>
                            {{ app()->getLocale() == 'ar' ? 'الفئة' : 'Category' }}
                        </label>
                        <select onchange="window.location.href=this.value" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-300 bg-white text-gray-700">
                            <option value="{{ request()->fullUrlWithQuery(['category' => 'all']) }}" {{ request('category') == 'all' || !request('category') ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'الكل' : 'All' }}
                            </option>
                            @foreach($categories as $category)
                            <option value="{{ request()->fullUrlWithQuery(['category' => $category]) }}" {{ request('category') == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Sort Filter -->
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-sort text-red-500 mr-2"></i>
                            {{ app()->getLocale() == 'ar' ? 'الترتيب حسب' : 'Sort By' }}
                        </label>
                        <select onchange="window.location.href=this.value" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-300 bg-white text-gray-700">
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'order' => 'desc']) }}" {{ request('sort') == 'created_at' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'الأحدث أولاً' : 'Newest First' }}
                            </option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'order' => 'asc']) }}" {{ request('sort') == 'created_at' && request('order') == 'asc' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'الأقدم أولاً' : 'Oldest First' }}
                            </option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'price', 'order' => 'asc']) }}" {{ request('sort') == 'price' && request('order') == 'asc' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'السعر: من الأقل للأعلى' : 'Price: Low to High' }}
                            </option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'price', 'order' => 'desc']) }}" {{ request('sort') == 'price' && request('order') == 'desc' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'السعر: من الأعلى للأقل' : 'Price: High to Low' }}
                            </option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'name', 'order' => 'asc']) }}" {{ request('sort') == 'name' && request('order') == 'asc' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'الاسم: أ-ي' : 'Name: A-Z' }}
                            </option>
                            <option value="{{ request()->fullUrlWithQuery(['sort' => 'name', 'order' => 'desc']) }}" {{ request('sort') == 'name' && request('order') == 'desc' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'الاسم: ي-أ' : 'Name: Z-A' }}
                            </option>
                        </select>
                    </div>
                    
                    <!-- Featured Filter -->
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-star text-red-500 mr-2"></i>
                            {{ app()->getLocale() == 'ar' ? 'المنتجات المميزة' : 'Featured Products' }}
                        </label>
                        <select onchange="window.location.href=this.value" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-300 bg-white text-gray-700">
                            <option value="{{ request()->fullUrlWithQuery(['featured' => 'all']) }}" {{ !request('featured') || request('featured') == 'all' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'جميع المنتجات' : 'All Products' }}
                            </option>
                            <option value="{{ request()->fullUrlWithQuery(['featured' => 'true']) }}" {{ request('featured') == 'true' ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'ar' ? 'المنتجات المميزة فقط' : 'Featured Only' }}
                            </option>
                        </select>
                    </div>
                    
                    <!-- Price Range Filter -->
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-dollar-sign text-red-500 mr-2"></i>
                            {{ app()->getLocale() == 'ar' ? 'نطاق السعر' : 'Price Range' }}
                        </label>
                        <div class="space-y-3">
                            <input type="number" placeholder="{{ app()->getLocale() == 'ar' ? 'السعر الأدنى' : 'Min Price' }}" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-300">
                            <input type="number" placeholder="{{ app()->getLocale() == 'ar' ? 'السعر الأقصى' : 'Max Price' }}" 
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-200 transition-all duration-300">
                        </div>
                    </div>
                    
                    <!-- Clear Filters Button -->
                    <a href="{{ route('products.index') }}" class="w-full bg-gray-100 text-gray-700 px-4 py-3 rounded-xl hover:bg-gray-200 transition-all duration-300 font-medium text-center">
                        <i class="fas fa-times mr-2"></i>
                        {{ app()->getLocale() == 'ar' ? 'مسح الفلاتر' : 'Clear Filters' }}
                    </a>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="lg:w-3/4">
                <!-- Results Header -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">
                                {{ app()->getLocale() == 'ar' ? 'جميع المنتجات' : 'All Products' }}
                            </h2>
                    </div>
                </div>
                
                <!-- Products Grid -->
                @if($products->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                    <div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-red-200" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative h-64 bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
                            @if($product->image)
                            <img src="{{ asset( $product->image) }}" 
                                 alt="{{ app()->getLocale() == 'ar' ? $product->title_ar : $product->title_en }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-red-50 to-red-100">
                                <i class="fas fa-box text-red-300 text-5xl"></i>
                            </div>
                            @endif
                            @if($product->featured)
                            <div class="absolute top-3 right-3 bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                                <i class="fas fa-star mr-1"></i>
                                {{ app()->getLocale() == 'ar' ? 'مميز' : 'Featured' }}
                            </div>
                            @endif
                            <!-- Quick Actions -->
                            {{-- <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <div class="flex space-x-2">
                                    <button class="bg-white p-2 rounded-full shadow-lg hover:bg-red-50 transition-colors">
                                        <i class="fas fa-heart text-red-500 text-sm"></i>
                                    </button>
                                    <button class="bg-white p-2 rounded-full shadow-lg hover:bg-red-50 transition-colors">
                                        <i class="fas fa-eye text-gray-600 text-sm"></i>
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="p-4">
                            <div class="mb-3">
                                @if($product->category_ar || $product->category_en)
                                <span class="inline-block px-2 py-1 bg-red-50 text-red-600 text-xs font-medium rounded-lg">
                                    <i class="fas fa-tag mr-1"></i>
                                    {{ app()->getLocale() == 'ar' ? $product->category_ar : $product->category_en }}
                                </span>
                                @endif
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-red-600 transition-colors">
                                {{ app()->getLocale() == 'ar' ? $product->title_ar : $product->title_en }}
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-2 text-sm leading-relaxed">
                                {{ app()->getLocale() == 'ar' ? Str::limit($product->description_ar, 80) : Str::limit($product->description_en, 80) }}
                            </p>
                            <div class="flex flex-col space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="text-xl font-bold text-red-600">
                                        {{ number_format($product->price, 2) }} {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}
                                    </div>
                                    <div class="text-xs text-green-600 font-medium">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        {{ app()->getLocale() == 'ar' ? 'متاح' : 'Available' }}
                                    </div>
                                </div>
                                <a href="{{ route('products.show', $product->slug) }}" class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white px-4 py-3 rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-300 transform hover:scale-105 shadow-lg font-medium flex items-center justify-center group">
                                    <i class="fas fa-shopping-bag mr-2 transition-transform duration-300 group-hover:translate-x-1"></i>
                                    <span>{{ app()->getLocale() == 'ar' ? 'تفاصيل المنتج' : 'Product Details' }}</span>
                                    <i class="fas fa-arrow-left ml-2 transition-transform duration-300 group-hover:translate-x-0"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Enhanced Pagination -->
                <div class="mt-20 flex justify-center">
                    {{ $products->links('pagination::tailwind') }}
                </div>
                @else
                <div class="text-center py-20 bg-white rounded-2xl shadow-lg border border-gray-100">
                    <div class="max-w-md mx-auto">
                        <div class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-search text-gray-400 text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">
                            {{ app()->getLocale() == 'ar' ? 'لا توجد منتجات' : 'No products found' }}
                        </h3>
                        <p class="text-gray-600 mb-6 text-lg">
                            {{ app()->getLocale() == 'ar' ? 'لم نجد أي منتجات تطابق بحثك. جرب تغيير الفئة أو معايير البحث.' : 'We couldn\'t find any products matching your search. Try changing the category or search criteria.' }}
                        </p>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center bg-red-600 text-white px-6 py-3 rounded-xl hover:bg-red-700 transition-colors">
                            <i class="fas fa-redo mr-2"></i>
                            {{ app()->getLocale() == 'ar' ? 'عرض كل المنتجات' : 'View All Products' }}
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-red-600 to-red-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'تحتاج إلى استشارة؟' : 'Need a Consultation?' }}
            </h2>
            <p class="text-xl mb-8 text-red-100">
                {{ app()->getLocale() == 'ar' ? 'تواصل معنا الآن واحصل على استشارة مجانية لاختيار المنتجات المناسبة لفعاليتك' : 'Contact us now and get a free consultation to choose the right products for your event' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quote') }}" class="bg-white text-red-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fas fa-file-invoice ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
