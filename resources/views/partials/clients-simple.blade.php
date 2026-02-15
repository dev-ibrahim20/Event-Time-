<!-- Simple Clients Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-red-500 to-red-600 rounded-full mb-6 shadow-lg">
                <i class="fas fa-handshake text-white text-3xl"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'شركاؤنا في النجاح' : 'Our Success Partners' }}
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'نفتخر بالشراكة مع أبرز الشركات والمؤسسات التي تثق في جودة خدماتنا' : 'We are proud to partner with leading companies and institutions that trust our quality services' }}
            </p>
        </div>
        
        @php
            try {
                $clients = \App\Models\Client::where('is_active', true)
                    ->orderBy('sort_order')
                    ->get(['id', 'name_ar', 'name_en', 'image', 'website_url']);
            } catch (\Exception $e) {
                $clients = collect();
            }
        @endphp
        
        @if($clients->count() > 0)
        <!-- Moving Clients Row - Horizontal Movement -->
        <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl p-8">
            <div class="animate-scroll-horizontal flex space-x-2 md:space-x-4 lg:space-x-6" style="animation: scrollHorizontal 15s linear infinite;">
                @foreach($clients as $index => $client)
                <div class="flex-shrink-0 text-center p-4 md:p-6 lg:p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 min-w-[200px] md:min-w-[280px] lg:min-w-[520px] max-w-[200px] md:max-w-[280px] lg:max-w-[520px]">
                    <!-- Client Logo - Circular Clickable -->
                    @if($client->website_url)
                    <a href="{{ $client->website_url }}" target="_blank" class="block w-16 h-16 md:w-20 md:h-20 lg:w-48 lg:h-48 mx-auto mb-4 md:mb-6 group">
                    @else
                    <div class="w-16 h-16 md:w-20 md:h-20 lg:w-48 lg:h-48 mx-auto mb-4 md:mb-6">
                    @endif
                        {{-- <div class="w-full h-full bg-white rounded-full shadow-lg p-6 flex items-center justify-center overflow-hidden transition-all duration-300 group-hover:shadow-2xl group-hover:scale-105"> --}}
                            @if($client->image)
                            <img src="{{ asset('assets/images/clients/' . $client->image) }}" 
                                 alt="{{ app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en }}" 
                                 class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110"
                                 onerror="console.log('Image not found: {{ asset('assets/images/clients/' . $client->image) }}'); this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none;" class="w-full h-full bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-4xl">
                                    {{ substr(app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en, 0, 2) }}
                                </span>
                            </div>
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-4xl">
                                    {{ substr(app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en, 0, 2) }}
                                </span>
                            </div>
                            @endif
                        {{-- </div> --}}
                    </a>
                </div>
                <a href="#"></a>
                @endforeach
                <!-- Duplicate clients for seamless loop -->
                @foreach($clients as $index => $client)
                <div class="flex-shrink-0 text-center p-4 md:p-6 lg:p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 min-w-[200px] md:min-w-[280px] lg:min-w-[520px] max-w-[200px] md:max-w-[280px] lg:max-w-[520px]">
                    <!-- Client Logo - Circular Clickable -->
                    @if($client->website_url)
                    <a href="{{ $client->website_url }}" target="_blank" class="block w-16 h-16 md:w-20 md:h-20 lg:w-48 lg:h-48 mx-auto mb-4 md:mb-6 group">
                    @else
                    <div class="w-16 h-16 md:w-20 md:h-20 lg:w-48 lg:h-48 mx-auto mb-4 md:mb-6">
                    @endif
                        {{-- <div class="w-full h-full bg-white rounded-full shadow-lg p-6 flex items-center justify-center overflow-hidden transition-all duration-300 group-hover:shadow-2xl group-hover:scale-105"> --}}
                            @if($client->image)
                            <img src="{{ asset('assets/images/clients/' . $client->image) }}" 
                                 alt="{{ app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en }}" 
                                 class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110"
                                 onerror="console.log('Image not found: {{ asset('assets/images/clients/' . $client->image) }}'); this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div style="display:none;" class="w-full h-full bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-4xl">
                                    {{ substr(app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en, 0, 2) }}
                                </span>
                            </div>
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-4xl">
                                    {{ substr(app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en, 0, 2) }}
                                </span>
                            </div>
                            @endif
                        {{-- </div> --}}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="text-center py-16 bg-white rounded-2xl shadow-xl border-2 border-gray-200">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-6">
                <i class="fas fa-users text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'قريباً' : 'Coming Soon' }}
            </h3>
            <p class="text-gray-600 text-lg">
                {{ app()->getLocale() == 'ar' ? 'سيتم عرض عملاؤنا المميزون قريباً' : 'Our valued clients will be displayed here soon' }}
            </p>
        </div>
        @endif
    </div>
</section>

<style>
@keyframes scrollHorizontal {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.animate-scroll-horizontal {
    display: flex;
    animation: scrollHorizontal 15s linear infinite;
}

/* Pause animation on hover */
.animate-scroll-horizontal:hover {
    animation-play-state: paused;
}

/* RTL Support */
[dir="rtl"] .animate-scroll-horizontal {
    animation-direction: reverse;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
    .animate-scroll-horizontal {
        animation-duration: 15s;
    }
}

@media (max-width: 768px) {
    .animate-scroll-horizontal {
        animation-duration: 12s;
    }
}

@media (max-width: 480px) {
    .animate-scroll-horizontal {
        animation-duration: 8s;
    }
}
</style>
