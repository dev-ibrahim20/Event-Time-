@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'خدماتنا - وقت الحدث' : 'Our Services - Event Time')
@section('description', app()->getLocale() == 'ar' ? 'نقدم مجموعة شاملة من الخدمات المتخصصة لتجهيز المؤتمرات والمعارض والخيام الأوروبية والحفلات بأعلى معايير الجودة' : 'We offer a comprehensive range of specialized services for conference, exhibition, and European tent setup with the highest quality standards')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-red-600 to-red-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'خدماتنا المميزة' : 'Our Featured Services' }}
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-4xl mx-auto leading-relaxed">
                {{ app()->getLocale() == 'ar' ? 'نقدم حلولاً متكاملة ومبتكرة لجميع فعالياتكم بمعايير عالمية وجودة فائقة' : 'We provide comprehensive and innovative solutions for all your events with world-class standards and superior quality' }}
            </p>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        @php
            $services = \App\Models\Service::all();
        @endphp
        
        @if($services->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <!-- Service Image -->
                <div class="relative h-64 bg-gradient-to-br from-red-50 to-red-100 overflow-hidden">
                    @if($service->image)
                    <img src="{{ asset('assets/imag/'.$service->image) }}" 
                         alt="{{ app()->getLocale() == 'ar' ? $service->title_ar : $service->title_en }}" 
                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-700"
                         onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gradient-to-br from-red-50 to-red-100\'><i class=\'fas fa-campground text-red-300 text-4xl\'></i></div>'">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-red-50 to-red-100">
                        <i class="fas fa-campground text-red-300 text-4xl"></i>
                    </div>
                    @endif
                    
                    <!-- Featured Badge -->
                    @if($service->featured)
                    <div class="absolute top-4 right-4">
                        <div class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-full shadow-lg flex items-center">
                            <i class="fas fa-star mr-1"></i>
                            <span class="font-bold text-xs">{{ app()->getLocale() == 'ar' ? 'مميز' : 'Featured' }}</span>
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Service Content -->
                <div class="p-6">
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-red-600 transition-colors">
                        {{ app()->getLocale() == 'ar' ? $service->title_ar : $service->title_en }}
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                        {{ app()->getLocale() == 'ar' ? $service->description_ar : $service->description_en }}
                    </p>
                    
                    <!-- Features -->
                    @if($service->features && is_array($service->features))
                    <div class="space-y-2 mb-4">
                        @foreach ($service->features as $index => $feature)
                            @if($index < 3) <!-- Show only first 3 features -->
                            <div class="flex items-start space-x-2 space-x-reverse">
                                <i class="fas fa-check-circle text-red-600 text-sm mt-0.5 flex-shrink-0"></i>
                                <p class="text-sm text-gray-600 line-clamp-1">{{ $feature }}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    @endif
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://wa.me/201234567890?text={{ app()->getLocale() == 'ar' ? 'أريد طلب عرض سعر' : 'I want to request a quote' }}" target="_blank" 
                           class="flex-1 bg-gradient-to-r border-x-green-600 from-red-800 to-red-800 text-red px-4 py-2 rounded-lg hover:bg-green-600 hover:text-white transition-all duration-300 transform hover:scale-105 shadow-lg font-medium text-sm text-center">
                            <i class="fab fa-whatsapp mr-1"></i>
                            {{ app()->getLocale() == 'ar' ? 'تواصل واتساب' : 'Contact WhatsApp' }}
                        </a>
                        <a href="{{ route('service-details', ['service' => $service->slug]) }}" 
                           class="flex-1 border-2 border-red-600 text-red-600 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300 font-medium text-sm text-center">
                            <i class="fas fa-shopping-cart mr-1"></i>
                            {{ app()->getLocale() == 'ar' ? 'تفاصيل الخدمة' : 'Service Details' }}
                        </a>
                        <a href="{{ route('gallery') }}" 
                           class="flex-1 border-2 border-red-600 text-red-600 px-4 py-2 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300 font-medium text-sm text-center">
                            <i class="fas fa-images mr-1"></i>
                            {{ app()->getLocale() == 'ar' ? 'معرض الصور' : 'Gallery' }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 bg-white rounded-2xl shadow-xl border-2 border-gray-200">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-6">
                <i class="fas fa-campground text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'قريباً' : 'Coming Soon' }}
            </h3>
            <p class="text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'سيتم إضافة الخدمات قريباً' : 'Services will be added soon' }}
            </p>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-red-600 to-red-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'هل تحتاج إلى استشارة لخدمتك؟' : '?Do you need consultation for your service' }}
            </h2>
            <p class="text-xl mb-8 text-red-100">
                {{ app()->getLocale() == 'ar' ? 'تواصل معنا الآن واحصل على استشارة مجانية وعرض سعر خاص' : 'Contact us now and get a free consultation and special quote' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quote') }}" class="bg-white text-red-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fas fa-file-invoice ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'طلب استشارة مجانية' : 'Request Free Consultation' }}
                </a>
                <a href="tel:+966500000000" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-bold hover:bg-white hover:text-red-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-phone ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'اتصال سريع' : 'Quick Call' }}
                </a>
            </div>
        </div>
    </div>
</section>

@include('partials.clients-simple')

@endsection
