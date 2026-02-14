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
            <div class="animate-scroll-horizontal flex space-x-6" style="animation: scrollHorizontal 25s linear infinite;">
                @foreach($clients as $index => $client)
                <div class="flex-shrink-0 text-center p-8 bg-gradient-to-br from-white to-gray-50 rounded-2xl border-2 border-gray-200 hover:border-red-300 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 min-w-[520px] max-w-[520px]">
                    <!-- Client Logo -->
                    <div class="w-48 h-48 mx-auto mb-6 bg-white rounded-2xl shadow-lg p-6 flex items-center justify-center">
                        @if($client->image)
                        <img src="{{ asset('assets/images/clients/' . $client->image) }}" 
                             alt="{{ app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en }}" 
                             class="w-full h-full object-contain transition-transform duration-300 hover:scale-110"
                             onerror="console.log('Image not found: {{ asset('assets/images/clients/' . $client->image) }}'); this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display:none;" class="w-full h-full bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-4xl">
                                {{ substr(app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en, 0, 2) }}
                            </span>
                        </div>
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-4xl">
                                {{ substr(app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en, 0, 2) }}
                            </span>
                        </div>
                        @endif
                    </div>
                    
                    <h3 class="font-bold text-gray-900 mb-3 text-xl whitespace-nowrap overflow-hidden text-ellipsis">
                        {{ app()->getLocale() == 'ar' ? $client->name_ar : $client->name_en }}
                    </h3>
                    
                    @if($client->website_url)
                    <a href="{{ $client->website_url }}" target="_blank" 
                       class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-full text-sm font-semibold transition-all duration-300 hover:shadow-lg hover:scale-105">
                        <i class="fas fa-external-link-alt ml-2"></i>
                        {{ app()->getLocale() == 'ar' ? 'زيارة الموقع' : 'Visit Website' }}
                    </a>
                    @endif
                </div>
                <a href="#"></a>
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
    animation: scrollHorizontal 25s linear infinite;
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
        animation-duration: 20s;
    }
    
    .min-w-\[520px\] {
        min-width: 440px !important;
    }
    
    .max-w-\[520px\] {
        max-width: 440px !important;
    }
    
    .w-48 {
        width: 10rem !important;
        height: 10rem !important;
    }
    
    .p-8 {
        padding: 1.5rem !important;
    }
}

@media (max-width: 768px) {
    .animate-scroll-horizontal {
        animation-duration: 15s;
    }
    
    .min-w-\[520px\] {
        min-width: 380px !important;
    }
    
    .max-w-\[520px\] {
        max-width: 380px !important;
    }
    
    .w-48 {
        width: 8rem !important;
        height: 8rem !important;
    }
    
    .p-8 {
        padding: 1.24rem !important;
    }
    
    .text-xl {
        font-size: 1.125rem !important;
    }
}

@media (max-width: 480px) {
    .animate-scroll-horizontal {
        animation-duration: 10s;
    }
    
    .min-w-\[520px\] {
        min-width: 320px !important;
    }
    
    .max-w-\[520px\] {
        max-width: 320px !important;
    }
    
    .w-48 {
        width: 6rem !important;
        height: 6rem !important;
    }
    
    .p-8 {
        padding: 1rem !important;
    }
    .text-xl {
        font-size: 1rem !important;
    }
}
</style>
