@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? $product->title_ar . ' - وقت الحدث' : $product->title_en . ' - Event Time')
@section('description', app()->getLocale() == 'ar' ? Str::limit($product->description_ar, 160) : Str::limit($product->description_en, 160))

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Product",
    "name": "{{ app()->getLocale() == 'ar' ? $product->title_ar : $product->title_en }}",
    "description": "{{ app()->getLocale() == 'ar' ? Str::limit($product->description_ar, 160) : Str::limit($product->description_en, 160) }}",
    "image": "{{ $product->image ? asset( $product->image) : asset('assets/images/placeholder.png') }}",
    "brand": {
        "@type": "Organization",
        "name": "وقت الحدث"
    },
    "offers": {
        "@type": "Offer",
        "price": "{{ $product->price }}",
        "priceCurrency": "SAR",
        "availability": "https://schema.org/InStock"
    }
}
</script>
@endsection

@section('content')
<!-- Breadcrumb -->
<nav class="bg-gray-50 py-4">
    <div class="container mx-auto px-4">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li>
                <a href="{{ route('home') }}" class="hover:text-red-600">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a>
            </li>
            <li class="flex items-center">
                <i class="fas fa-chevron-left {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                <a href="{{ route('products.index') }}" class="hover:text-red-600">{{ app()->getLocale() == 'ar' ? 'المنتجات' : 'Products' }}</a>
            </li>
            <li class="flex items-center">
                <i class="fas fa-chevron-left {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                <span class="text-gray-900">{{ app()->getLocale() == 'ar' ? $product->title_ar : $product->title_en }}</span>
            </li>
        </ol>
    </div>
</nav>

<!-- Product Detail Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div class="space-y-4" data-aos="fade-right">
                <div class="relative h-96 bg-gray-100 rounded-xl overflow-hidden">
                    @if($product->image)
                    <img src="{{ asset( $product->image) }}" 
                         alt="{{ app()->getLocale() == 'ar' ? $product->title_ar : $product->title_en }}" 
                         class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-box text-gray-400 text-6xl"></i>
                    </div>
                    @endif
                    @if($product->featured)
                    <div class="absolute top-4 right-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                        {{ app()->getLocale() == 'ar' ? 'مميز' : 'Featured' }}
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="space-y-6" data-aos="fade-left">
                <!-- Category -->
                @if($product->category_ar || $product->category_en)
                <div>
                    <span class="text-red-600 font-medium text-sm">
                        {{ app()->getLocale() == 'ar' ? $product->category_ar : $product->category_en }}
                    </span>
                </div>
                @endif
                
                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                    {{ app()->getLocale() == 'ar' ? $product->title_ar : $product->title_en }}
                </h1>
                
                <!-- Price -->
                <div class="flex items-center space-x-4">
                    <div class="text-3xl font-bold text-red-600">
                        {{ number_format($product->price, 2) }} {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}
                    </div>
                    <div class="text-green-600 font-medium">
                        <i class="fas fa-check-circle"></i>
                        {{ app()->getLocale() == 'ar' ? 'متاح للطلب' : 'Available' }}
                    </div>
                </div>
                
                <!-- Description -->
                <div class="prose prose-lg max-w-none">
                    <p class="text-gray-600 leading-relaxed">
                        {{ app()->getLocale() == 'ar' ? $product->description_ar : $product->description_en }}
                    </p>
                </div>
                
                <!-- Features -->
                <div class="border-t border-b py-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">
                        {{ app()->getLocale() == 'ar' ? 'المميزات الرئيسية' : 'Key Features' }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-check text-green-500"></i>
                            <span class="text-gray-700">{{ app()->getLocale() == 'ar' ? 'جودة عالية' : 'High Quality' }}</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-check text-green-500"></i>
                            <span class="text-gray-700">{{ app()->getLocale() == 'ar' ? 'توصيل سريع' : 'Fast Delivery' }}</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-check text-green-500"></i>
                            <span class="text-gray-700">{{ app()->getLocale() == 'ar' ? 'ضمان الجودة' : 'Quality Guarantee' }}</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-check text-green-500"></i>
                            <span class="text-gray-700">{{ app()->getLocale() == 'ar' ? 'دعم فني' : 'Technical Support' }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/201234567890?text={{ app()->getLocale() == 'ar' ? 'أريد طلب عرض سعر' : 'I want to request a quote' }}" target="_blank" class="flex-1 bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition-colors text-center font-semibold">
                        <i class="fab fa-whatsapp {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                        {{ app()->getLocale() == 'ar' ? 'تواصل عبر واتس앱' : 'Contact via WhatsApp' }}
                    </a>
                    <a href="tel:+966500000000" class="flex-1 bg-gray-100 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-200 transition-colors text-center font-semibold">
                        <i class="fas fa-phone {{ app()->getLocale() == 'ar' ? 'ml-2' : 'mr-2' }}"></i>
                        {{ app()->getLocale() == 'ar' ? 'اتصال الآن' : 'Call Now' }}
                    </a>
                </div>
                
                <!-- Share -->
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مشاركة:' : 'Share:' }}</span>
                    <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/201234567890" target="_blank" class="text-gray-400 hover:text-red-600 transition-colors">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'منتجات ذات صلة' : 'Related Products' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'منتجات قد تهمك في نفس الفئة' : 'Products that might interest you in the same category' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $relatedProduct)
            <div class="luxury-card bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="relative h-48 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if($relatedProduct->image)
                    <img src="{{ asset( $relatedProduct->image) }}" 
                         alt="{{ app()->getLocale() == 'ar' ? $relatedProduct->title_ar : $relatedProduct->title_en }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-box text-gray-400 text-4xl"></i>
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        {{ app()->getLocale() == 'ar' ? Str::limit($relatedProduct->title_ar, 30) : Str::limit($relatedProduct->title_en, 30) }}
                    </h3>
                    <div class="flex items-center justify-between">
                        <div class="text-xl font-bold text-red-600">
                            {{ number_format($relatedProduct->price, 2) }} {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}
                        </div>
                        <a href="{{ route('products.show', $relatedProduct->slug) }}" class="text-red-600 hover:text-red-700 font-medium">
                            {{ app()->getLocale() == 'ar' ? 'عرض' : 'View' }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Latest Products -->
@if($latestProducts->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'أحدث المنتجات' : 'Latest Products' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'استكشف أحدث إضافاتنا من المنتجات' : 'Explore our latest product additions' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($latestProducts as $latestProduct)
            <div class="luxury-card bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="relative h-48 bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden">
                    @if($latestProduct->image)
                    <img src="{{ asset( $latestProduct->image) }}" 
                         alt="{{ app()->getLocale() == 'ar' ? $latestProduct->title_ar : $latestProduct->title_en }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-box text-gray-400 text-4xl"></i>
                    </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">
                        {{ app()->getLocale() == 'ar' ? Str::limit($latestProduct->title_ar, 30) : Str::limit($latestProduct->title_en, 30) }}
                    </h3>
                    <div class="flex items-center justify-between">
                        <div class="text-xl font-bold text-red-600">
                            {{ number_format($latestProduct->price, 2) }} {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}
                        </div>
                        <a href="{{ route('products.show', $latestProduct->slug) }}" class="text-red-600 hover:text-red-700 font-medium">
                            {{ app()->getLocale() == 'ar' ? 'عرض' : 'View' }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-red-600 to-red-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'هل أنت مهتم بهذا المنتج؟' : 'Interested in This Product?' }}
            </h2>
            <p class="text-xl mb-8 text-red-100">
                {{ app()->getLocale() == 'ar' ? 'تواصل معنا الآن واحصل على استشارة مجانية وعرض سعر خاص' : 'Contact us now and get a free consultation and special quote' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/201234567890?text={{ app()->getLocale() == 'ar' ? 'أريد طلب عرض سعر' : 'I want to request a quote' }}" target="_blank" class="bg-green-500 text-white px-8 py-4 rounded-lg text-lg font-bold hover:bg-green-600 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fab fa-whatsapp ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'تواصل عبر واتس앱' : 'Contact via WhatsApp' }}
                </a>
                <a href="tel:+966500000000" class="bg-white/20 backdrop-blur-md text-white border-2 border-white px-8 py-4 rounded-lg text-lg font-bold hover:bg-white hover:text-red-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-phone ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'اتصال سريع' : 'Quick Call' }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
