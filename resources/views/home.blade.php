@extends('layouts.app')

@section('title', 'وقت الحدث - تجهيز المؤتمرات والمعارض والخيام الأوروبية')
@section('description', 'شركة وقت الحدث الرائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية بأعلى معايير الجودة والاحترافية في المملكة العربية السعودية')

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "وقت الحدث",
    "alternateName": "Event Time",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('assets/images/logo.png') }}",
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+966500000000",
        "contactType": "customer service",
        "availableLanguage": ["Arabic", "English"]
    },
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "SA",
        "addressLocality": "الرياض",
        "addressRegion": "الرياض"
    },
    "sameAs": [
        "https://www.facebook.com/eventtime",
        "https://www.twitter.com/eventtime",
        "https://www.instagram.com/eventtime"
    ]
}
</script>
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Video/Image -->
    <div class="hero-video">
        <video autoplay muted loop playsinline class="w-full h-full object-cover">
            <source src="{{ asset('assets/videos/hero-video.mp4') }}" type="video/mp4">
            <img src="{{ asset('assets/images/hero-bg.jpg') }}" alt="وقت الحدث" class="w-full h-full object-cover">
        </video>
    </div>
    <div class="hero-overlay"></div>
    
    <!-- Hero Content -->
    <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto" data-aos="fade-up">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
            {{ app()->getLocale() == 'ar' ? 'وقت الحدث' : 'Event Time' }}
            <span class="block text-2xl md:text-4xl lg:text-5xl mt-2 text-red-400">Event Time</span>
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-gray-200 leading-relaxed">
            {{ app()->getLocale() == 'ar' ? 'الشريك الموثوق في تجهيز المؤتمرات والمعارض والخيام الأوروبية بأعلى معايير الجودة والاحترافية' : 'Your trusted partner for conference, exhibition, and European tent setup with the highest quality and professional standards' }}
        </p>
        
        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('quote') }}" class="bg-gradient-to-r from-red-600 to-red-800 text-white px-8 py-4 rounded-lg text-lg font-bold hover:from-red-700 hover:to-red-900 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                <i class="fas fa-file-invoice ml-2"></i>
                {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
            </a>
            <a href="tel:+966500000000" class="bg-white/20 backdrop-blur-md text-white border-2 border-white px-8 py-4 rounded-lg text-lg font-bold hover:bg-white hover:text-red-600 transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-phone ml-2"></i>
                {{ app()->getLocale() == 'ar' ? 'اتصال سريع' : 'Quick Call' }}
            </a>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'لماذا تختار وقت الحدث؟' : 'Why Choose Event Time?' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'نقدم حلولاً متكاملة ومبتكرة لجميع فعالياتكم بمعايير عالمية وجودة فائقة' : 'We provide comprehensive and innovative solutions for all your events with world-class standards and superior quality' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-award text-red-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'جودة عالمية' : 'World Class Quality' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نستخدم أفضل المواد والتقنيات العالمية في جميع خدماتنا' : 'We use the best materials and technologies in all our services' }}</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-clock text-red-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'التزام بالمواعيد' : 'On-Time Commitment' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نلتزم بتسليم جميع المشاريع في الوقت المحدد' : 'We are committed to delivering all projects on time' }}</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-users text-red-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'فريق محترف' : 'Professional Team' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'فريق عمل متخصص ومدرب على أعلى مستوى' : 'Specialized and highly trained team' }}</p>
            </div>
            
            <!-- Feature 4 -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="400">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-handshake text-red-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'ثقة وضمان' : 'Trust & Guarantee' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نقدم ضمانات على جميع خدماتنا ومنتجاتنا' : 'We provide guarantees on all our services and products' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'خدماتنا المميزة' : 'Our Featured Services' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'نقدم مجموعة شاملة من الخدمات المتخصصة لتلبية جميع احتياجات فعالياتكم' : 'We offer a comprehensive range of specialized services to meet all your event needs' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Service 1 -->
            <div class="luxury-card bg-white rounded-xl shadow-lg overflow-hidden group" data-aos="fade-up" data-aos-delay="100">
                <div class="h-48 bg-gradient-to-br from-red-500 to-red-700 flex items-center justify-center">
                    <i class="fas fa-campground text-white text-5xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'الخيام الأوروبية' : 'European Tents' }}</h3>
                    <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'خيام أوروبية بمواصفات عالمية وأحجام متنوعة' : 'European tents with world-class specifications and various sizes' }}</p>
                    <a href="{{ route('services') }}" class="text-red-600 font-bold hover:text-red-700 transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'تفاصيل أكثر' : 'More Details' }} <i class="fas fa-arrow-left mr-1"></i>
                    </a>
                </div>
            </div>
            
            <!-- Service 2 -->
            <div class="luxury-card bg-white rounded-xl shadow-lg overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                    <i class="fas fa-users text-white text-5xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'تجهيز المؤتمرات' : 'Conference Setup' }}</h3>
                    <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'شاشات LED وإضاءة وصوتيات احترافية' : 'Professional LED screens, lighting, and sound systems' }}</p>
                    <a href="{{ route('services') }}#conferences" class="text-red-600 font-bold hover:text-red-700 transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'تفاصيل أكثر' : 'More Details' }} <i class="fas fa-arrow-left mr-1"></i>
                    </a>
                </div>
            </div>
            
            <!-- Service 3 -->
            <div class="luxury-card bg-white rounded-xl shadow-lg overflow-hidden group" data-aos="fade-up" data-aos-delay="300">
                <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center">
                    <i class="fas fa-store text-white text-5xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'أجنحة المعارض' : 'Exhibition Stands' }}</h3>
                    <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'تصميم وبناء أجنحة معارض احترافية' : 'Professional exhibition stand design and construction' }}</p>
                    <a href="{{ route('services') }}#exhibitions" class="text-red-600 font-bold hover:text-red-700 transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'تفاصيل أكثر' : 'More Details' }} <i class="fas fa-arrow-left mr-1"></i>
                    </a>
                </div>
            </div>
            
            <!-- Service 4 -->
            <div class="luxury-card bg-white rounded-xl shadow-lg overflow-hidden group" data-aos="fade-up" data-aos-delay="400">
                <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center">
                    <i class="fas fa-glass-cheers text-white text-5xl"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'تجهيز الحفلات' : 'Event Setup' }}</h3>
                    <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'تنظيم وتجهيز الحفلات والمناسبات الرسمية' : 'Organization and setup of parties and official occasions' }}</p>
                    <a href="{{ route('services') }}#events" class="text-red-600 font-bold hover:text-red-700 transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'تفاصيل أكثر' : 'More Details' }} <i class="fas fa-arrow-left mr-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-red-600 to-red-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'هل أنت مستعد لتنظيم فعاليتك المثالية؟' : '?Are you ready to organize your perfect event' }}
            </h2>
            <p class="text-xl mb-8 text-red-100">
                {{ app()->getLocale() == 'ar' ? 'تواصل معنا الآن واحصل على استشارة مجانية وعرض سعر خاص' : 'Contact us now and get a free consultation and special quote' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quote') }}" class="bg-white text-red-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fas fa-file-invoice ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
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
