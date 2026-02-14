@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'وقت الحدث - تجهيز المؤتمرات والمعارض والخيام الأوروبية' : 'Event Time - Conference, Exhibition & European Tent Setup')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-red-600 to-red-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'وقت الحدث' : 'Event Time' }}
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-4xl mx-auto leading-relaxed mb-8">
                {{ app()->getLocale() == 'ar' ? 'شركة رائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية بأعلى معايير الجودة والاحترافية' : 'Leading company in conference, exhibition, and European tent setup with the highest quality standards and professionalism' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('services') }}" class="bg-white text-red-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fas fa-concierge-bell ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'استكشف خدماتنا' : 'Explore Our Services' }}
                </a>
                <a href="{{ route('quote') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-bold hover:bg-white hover:text-red-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-file-invoice ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
                </a>
            </div>
        </div>
    </div>
    
    <!-- Decorative Elements -->
    <div class="absolute top-10 right-10 w-20 h-20 bg-white opacity-10 rounded-full"></div>
    <div class="absolute bottom-10 left-10 w-32 h-32 bg-white opacity-5 rounded-full"></div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-award text-red-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'جودة فائقة' : 'Superior Quality' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نلتزم بأعلى معايير الجودة في كل ما نقدمه' : 'We commit to the highest quality standards in everything we offer' }}</p>
            </div>
            
            <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-600 transition-colors duration-300">
                    <i class="fas fa-clock text-blue-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'التزام بالمواعيد' : 'Punctuality' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نلتزم بتسليم المشاريع في الوقت المحدد' : 'We commit to delivering projects on time' }}</p>
            </div>
            
            <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-600 transition-colors duration-300">
                    <i class="fas fa-users text-green-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'فريق محترف' : 'Professional Team' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'فريق من الخبراء المتخصصين في تنظيم الفعاليات' : 'A team of experts specialized in event management' }}</p>
            </div>
            
            <div class="text-center group" data-aos="fade-up" data-aos-delay="400">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-600 transition-colors duration-300">
                    <i class="fas fa-shield-alt text-purple-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'ضمان الخدمة' : 'Service Guarantee' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نضمن جودة الخدمة ورضا العملاء' : 'We guarantee service quality and customer satisfaction' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Clients Section -->
@include('partials.clients-section', ['bgColor' => 'bg-gray-50', 'showCta' => true])

<!-- Quick Stats Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'أرقام تحكي نجاحنا' : 'Numbers That Tell Our Success' }}
            </h2>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl font-bold text-red-600 mb-2">500+</div>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'مشروع منجز' : 'Completed Projects' }}</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl font-bold text-red-600 mb-2">10+</div>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'سنوات خبرة' : 'Years of Experience' }}</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="text-4xl font-bold text-red-600 mb-2">50+</div>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'موظف متخصص' : 'Specialized Staff' }}</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="text-4xl font-bold text-red-600 mb-2">98%</div>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'رضا العملاء' : 'Client Satisfaction' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-red-600 to-red-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'هل أنت مستعد لتنظيم فعاليتك المثالية؟' : 'Ready to Organize Your Perfect Event?' }}
            </h2>
            <p class="text-xl mb-8 text-red-100">
                {{ app()->getLocale() == 'ar' ? 'تواصل معنا اليوم واحصل على استشارة مجانية وعرض سعر خاص' : 'Contact us today and get a free consultation and special quote' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="bg-white text-red-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fas fa-phone ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'تواصل معنا الآن' : 'Contact Us Now' }}
                </a>
                <a href="{{ route('quote') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-bold hover:bg-white hover:text-red-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-file-invoice ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
                </a>
            </div>
        </div>
    </div>
</section>

@include('partials.clients-simple')

@endsection
