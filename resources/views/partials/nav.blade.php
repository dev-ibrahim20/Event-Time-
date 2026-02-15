<nav class="fixed top-0 w-full bg-white/95 backdrop-blur-md shadow-sm z-50 transition-all duration-300" x-data="{ isOpen: false }">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-800 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-xl font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'وقت الحدث' : 'Event Time' }}</h1>
                    </div>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : 'space-x-8' }}">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-red-600 transition-colors font-medium">{{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}</a>
                @if (app()->getLocale() == 'en')
                    <a href=""></a>
                @endif
                <a href="{{ route('services') }}" class="text-gray-700 hover:text-red-600 transition-colors font-medium">{{ app()->getLocale() == 'ar' ? 'خدماتنا' : 'Our Services' }}</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 transition-colors font-medium">{{ app()->getLocale() == 'ar' ? 'منتجتنا' : 'Our Products' }}</a>
                <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-red-600 transition-colors font-medium">{{ app()->getLocale() == 'ar' ? 'اعمالنا' : 'Our Work' }}</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-red-600 transition-colors font-medium">{{ app()->getLocale() == 'ar' ? 'من نحن' : 'About Us' }}</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-red-600 transition-colors font-medium">{{ app()->getLocale() == 'ar' ? 'اتصل بنا' : 'Contact Us' }}</a>
            </div>

            <!-- CTA Buttons & Language Switcher -->
            <div class="hidden lg:flex items-center space-x-4 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : 'space-x-4' }}">
                <!-- Language Switcher -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-red-600 transition-colors">
                        <i class="fas fa-globe"></i>
                        <span class="text-sm font-medium">{{ app()->getLocale() === 'ar' ? 'العربية' : 'English' }}</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition class="absolute top-full mt-2 w-24 bg-white rounded-lg shadow-lg py-2">
                        <a href="{{ route('language.switch', 'ar') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600">العربية</a>
                        <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600">English</a>
                    </div>
                </div>
                
                <!-- Quick Contact Button -->
                <a href="tel:+966500000000" class="flex items-center space-x-2 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                    <i class="fas fa-phone"></i>
                    <span class="text-sm font-medium">{{ app()->getLocale() == 'ar' ? 'اتصال سريع' : 'Quick Call' }}</span>
                </a>
                
                <!-- Quote Request Button -->
                <a href="https://wa.me/201234567890?text={{ app()->getLocale() == 'ar' ? 'أريد طلب عرض سعر' : 'I want to request a quote' }}" target="_blank" class="bg-gradient-to-r from-red-600 to-red-800 text-white px-6 py-2 rounded-lg hover:from-red-700 hover:to-red-900 transition-all duration-300 transform hover:scale-105">
                    <span class="font-medium">{{ app()->getLocale() == 'ar' ? 'تواصل واتساب' : 'Contact WhatsApp' }}</span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="isOpen = !isOpen" class="lg:hidden text-gray-700 hover:text-red-600 transition-colors">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" x-transition class="lg:hidden bg-white border-t">
        <div class="container mx-auto px-4 py-4 space-y-3">
            <!-- Mobile Language Switcher -->
            <div class="mb-4">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 rounded-lg border border-gray-200 bg-white shadow-sm">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-globe"></i>
                            <span class="text-sm font-medium">{{ app()->getLocale() === 'ar' ? 'العربية' : 'English' }}</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition class="absolute top-full mt-2 w-full bg-white rounded-lg shadow-xl py-2 border border-gray-100">
                        <a href="{{ route('language.switch', 'ar') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                            <i class="fas fa-globe mr-3 text-red-500"></i>
                            <span>العربية</span>
                            @if(app()->getLocale() == 'ar')
                                <i class="fas fa-check ml-auto text-green-500"></i>
                            @endif
                        </a>
                        <a href="{{ route('language.switch', 'en') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                            <i class="fas fa-globe mr-3 text-blue-500"></i>
                            <span>English</span>
                            @if(app()->getLocale() == 'en')
                                <i class="fas fa-check ml-auto text-green-500"></i>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t pt-4">
                <h3 class="text-lg font-bold text-gray-900 mb-4 px-4">
                    {{ app()->getLocale() == 'ar' ? 'القائمة الرئيسية' : 'Main Menu' }}
                </h3>
            </div>
            
            <a href="{{ route('home') }}" class="block text-gray-700 hover:text-red-600 transition-colors font-medium py-2 px-4">
                <i class="fas fa-home mr-3"></i>
                {{ app()->getLocale() == 'ar' ? 'الرئيسية' : 'Home' }}
            </a>
            <a href="{{ route('services') }}" class="block text-gray-700 hover:text-red-600 transition-colors font-medium py-2 px-4">
                <i class="fas fa-concierge-bell mr-3"></i>
                {{ app()->getLocale() == 'ar' ? 'خدماتنا' : 'Our Services' }}
            </a>
            <a href="{{ route('products.index') }}" class="block text-gray-700 hover:text-red-600 transition-colors font-medium py-2 px-4">
                <i class="fas fa-shopping-bag mr-3"></i>
                {{ app()->getLocale() == 'ar' ? 'منتجتنا' : 'Our Products' }}
            </a>
            <a href="{{ route('gallery') }}" class="block text-gray-700 hover:text-red-600 transition-colors font-medium py-2 px-4">
                <i class="fas fa-images mr-3"></i>
                {{ app()->getLocale() == 'ar' ? 'معرض الأعمال' : 'Gallery' }}
            </a>
            <a href="{{ route('about') }}" class="block text-gray-700 hover:text-red-600 transition-colors font-medium py-2 px-4">
                <i class="fas fa-info-circle mr-3"></i>
                {{ app()->getLocale() == 'ar' ? 'من نحن' : 'About Us' }}
            </a>
            <a href="{{ route('contact') }}" class="block text-gray-700 hover:text-red-600 transition-colors font-medium py-2 px-4">
                <i class="fas fa-envelope mr-3"></i>
                {{ app()->getLocale() == 'ar' ? 'اتصل بنا' : 'Contact Us' }}
            </a>
            
            <div class="pt-4 border-t space-y-3">
                <a href="tel:+966500000000" class="flex items-center justify-center space-x-2 bg-red-600 text-white px-4 py-3 rounded-lg hover:bg-red-700 transition-colors">
                    <i class="fas fa-phone"></i>
                    <span class="font-medium">{{ app()->getLocale() == 'ar' ? 'اتصال سريع' : 'Quick Call' }}</span>
                </a>
                <a href="{{ route('quote') }}" class="block text-center bg-gradient-to-r from-red-600 to-red-800 text-white px-6 py-3 rounded-lg hover:from-red-700 hover:to-red-900 transition-all duration-300">
                    <i class="fas fa-file-invoice mr-2"></i>
                    <span class="font-medium">{{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}</span>
                </a>
            </div>
        </div>
    </div>
</nav>
