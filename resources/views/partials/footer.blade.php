<footer class="bg-gray-900 text-white">
    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                    <img src="{{ asset('assets/images/logo-even.jpeg') }}" alt="" class="w-10 h-10">
                    <div>
                        <h3 class="text-xl font-bold">{{ app()->getLocale() == 'ar' ? 'وقت الحدث' : 'Event Time' }}</h3>
                        <p class="text-sm text-gray-400">Event Time</p>
                    </div>
                </div>
                <p class="text-gray-300 leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? 'شركتنا الرائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية بأعلى معايير الجودة والاحترافية.' : 'Our trusted company in conference, exhibition, and European tent setup with the highest quality and professional standards.' }}
                </p>
                <div class="flex space-x-4 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-red-600 transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h4 class="text-lg font-bold text-red-500">{{ app()->getLocale() == 'ar' ? 'روابط سريعة' : 'Quick Links' }}</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-red-500 transition-colors">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a></li>
                    <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-red-500 transition-colors">{{ app()->getLocale() == 'ar' ? 'خدماتنا' : 'Our Services' }}</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-gray-300 hover:text-red-500 transition-colors">{{ app()->getLocale() == 'ar' ? 'معرض الأعمال' : 'Gallery' }}</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-red-500 transition-colors">{{ app()->getLocale() == 'ar' ? 'من نحن' : 'About Us' }}</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-red-500 transition-colors">{{ app()->getLocale() == 'ar' ? 'اتصل بنا' : 'Contact Us' }}</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div class="space-y-4">
                <h4 class="text-lg font-bold text-red-500">{{ app()->getLocale() == 'ar' ? 'خدماتنا' : 'Our Services' }}</h4>
                <ul class="space-y-2">
                    @php
                        $services = \App\Models\Service::where('status', true)->take(5)->get();
                    @endphp
                    @foreach($services as $service)
                        <li><a href="{{ route('services') }}#service-{{ $service->id }}" class="text-gray-300 hover:text-red-500 transition-colors">{{ app()->getLocale() == 'ar' ? $service->title_ar : $service->title_en }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4">
                <h4 class="text-lg font-bold text-red-500">{{ app()->getLocale() == 'ar' ? 'تواصل معنا' : 'Contact Us' }}</h4>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                        <i class="fas fa-map-marker-alt text-red-500 mt-1"></i>
                        <div>
                            <p class="text-gray-300">{{ app()->getLocale() == 'ar' ? 'المملكة العربية السعودية' : 'Saudi Arabia' }}</p>
                            <p class="text-gray-400 text-sm">{{ app()->getLocale() == 'ar' ? 'الرياض، حي النخيل' : 'Riyadh, An Nakhil' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                        <i class="fas fa-phone text-red-500"></i>
                        <div>
                            <p class="text-gray-300">+966 50 000 0000</p>
                            <p class="text-gray-400 text-sm">+966 11 000 0000</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                        <i class="fas fa-envelope text-red-500"></i>
                        <div>
                            <p class="text-gray-300">info@eventtime.sa</p>
                            <p class="text-gray-400 text-sm">support@eventtime.sa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-gray-400 text-sm">
                    <p>&copy; {{ date('Y') }} {{ __('وقت الحدث') }}. {{ __('جميع الحقوق محفوظة') }}.</p>
                </div>
                <div class="flex space-x-6 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                    <a href="#" class="text-gray-400 hover:text-red-500 text-sm transition-colors">{{ __('سياسة الخصوصية') }}</a>
                    <a href="#" class="text-gray-400 hover:text-red-500 text-sm transition-colors">{{ __('الشروط والأحكام') }}</a>
                    <a href="#" class="text-gray-400 hover:text-red-500 text-sm transition-colors">{{ __('خريطة الموقع') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Fixed Social Media Sidebar -->
<div class="fixed {{ app()->getLocale() === 'ar' ? 'left-4' : 'right-4' }} top-1/2 transform -translate-y-1/2 z-40 flex flex-col space-y-3">
    <!-- WhatsApp -->
    <a href="https://wa.me/201234567890?text={{ app()->getLocale() == 'ar' ? 'أريد استفسار' : 'I have a question' }}" target="_blank" class="w-12 h-12 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-all duration-300 transform hover:scale-110 shadow-lg">
        <i class="fab fa-whatsapp text-xl"></i>
    </a>
    
    <!-- Phone -->
    <a href="tel:+966500000000" class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center hover:bg-blue-600 transition-all duration-300 transform hover:scale-110 shadow-lg">
        <i class="fas fa-phone text-xl"></i>
    </a>
    
    <!-- Instagram -->
    <a href="#" class="w-12 h-12 bg-pink-500 text-white rounded-full flex items-center justify-center hover:bg-pink-600 transition-all duration-300 transform hover:scale-110 shadow-lg">
        <i class="fab fa-instagram text-xl"></i>
    </a>
    
    <!-- Facebook -->
    <a href="#" class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-all duration-300 transform hover:scale-110 shadow-lg">
        <i class="fab fa-facebook-f text-xl"></i>
    </a>
    
    <!-- Twitter -->
    <a href="#" class="w-12 h-12 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition-all duration-300 transform hover:scale-110 shadow-lg">
        <i class="fab fa-twitter text-xl"></i>
    </a>
</div>
