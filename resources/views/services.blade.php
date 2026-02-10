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

<!-- Services Navigation -->
<section class="sticky top-20 z-40 bg-white shadow-md border-b">
    <div class="container mx-auto px-4">
        <nav class="flex flex-wrap justify-center py-4 space-x-8 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
            <a href="#tents" class="text-gray-700 hover:text-red-600 font-medium transition-colors py-2">
                <i class="fas fa-campground ml-2"></i>{{ app()->getLocale() == 'ar' ? 'الخيام الأوروبية' : 'European Tents' }}
            </a>
            @if (app()->getLocale() == 'en')
                <a href=""></a>
            @endif
            <a href="#conferences" class="text-gray-700 hover:text-red-600 font-medium transition-colors py-2">
                <i class="fas fa-users ml-2"></i>{{ app()->getLocale() == 'ar' ? 'تجهيز المؤتمرات' : 'Conference Setup' }}
            </a>
            <a href="#exhibitions" class="text-gray-700 hover:text-red-600 font-medium transition-colors py-2">
                <i class="fas fa-store ml-2"></i>{{ app()->getLocale() == 'ar' ? 'أجنحة المعارض' : 'Exhibition Stands' }}
            </a>
            <a href="#events" class="text-gray-700 hover:text-red-600 font-medium transition-colors py-2">
                <i class="fas fa-glass-cheers ml-2"></i>{{ app()->getLocale() == 'ar' ? 'تجهيز الحفلات' : 'Event Setup' }}
            </a>
        </nav>
    </div>
</section>

<!-- European Tents Section -->
<section id="tents" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div data-aos="fade-right">
                <div class="mb-6">
                    <span class="bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm font-bold">
                        {{ app()->getLocale() == 'ar' ? 'خدمة مميزة' : 'Featured Service' }}
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ app()->getLocale() == 'ar' ? 'الخيام الأوروبية' : 'European Tents' }}
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? 'نقدم أحدث الخيام الأوروبية بمواصفات عالمية، مصممة لتلبية جميع احتياجات الفعاليات الكبرى. خيامنا تتميز بالمتانة والجودة العالية والتصميم الأنيق الذي يضيف لمسة من الفخامة لفعاليتكم.' : 'We offer the latest European tents with world-class specifications, designed to meet all your major event needs. Our tents are distinguished by luxury, high quality, and elegant design that adds a touch of sophistication to your events.' }}
                </p>
                
                <!-- Features -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-red-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'مقاسات متنوعة' : 'Various Sizes' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'من 10x10م حتى 50x100م وأكثر' : 'From 10x10m to 50x100m and more' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-red-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'مواد عالية الجودة' : 'High Quality Materials' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'قماش مقاوم للحريق والطقس' : 'Fire and weather resistant' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-red-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'تصميم عصري' : 'Elegant Design' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'أشكال وألوان متنوعة تناسب جميع المناسبات' : 'Various shapes and colors suitable for all occasions' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-red-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'تركيب احترافي' : 'Professional Installation' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'فريق متخصص للتركيب والفك السريع' : 'Specialized team for quick installation and dismantling' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('quote') }}?service=tents" class="bg-red-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-red-700 transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
                    </a>
                    <a href="{{ route('gallery') }}#tents" class="border-2 border-red-600 text-red-600 px-6 py-3 rounded-lg font-bold hover:bg-red-600 hover:text-white transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'معرض الصور' : 'View Gallery' }}
                    </a>
                </div>
            </div>
            
            <div data-aos="fade-left">
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('assets/images/tents/tent1.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'خيمة أوروبية 1' : 'European Tent 1' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/tents/tent2.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'خيمة أوروبية 2' : 'European Tent 2' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/tents/tent3.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'خيمة أوروبية 3' : 'European Tent 3' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/tents/tent4.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'خيمة أوروبية 4' : 'European Tent 4' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Conferences Section -->
<section id="conferences" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div class="order-2 lg:order-1" data-aos="fade-right">
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('assets/images/conferences/conf1.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'مؤتمر 1' : 'Conference 1' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/conferences/conf2.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'مؤتمر 2' : 'Conference 2' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/conferences/conf3.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'مؤتمر 3' : 'Conference 3' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/conferences/conf4.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'مؤتمر 4' : 'Conference 4' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                </div>
            </div>
            
            <div class="order-1 lg:order-2" data-aos="fade-left">
                <div class="mb-6">
                    <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-bold">
                        {{ app()->getLocale() == 'ar' ? 'خدمة متكاملة' : 'Complete Service' }}
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ app()->getLocale() == 'ar' ? 'تجهيز المؤتمرات والندوات' : 'Conference & Seminar Setup' }}
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? 'نوفر تجهيزات متكاملة للمؤتمرات والندوات بأحدث التقنيات. من شاشات LED ضخمة إلى أنظمة الصوت الاحترافية والإضاءة المتطورة، نضمن لكم مؤتمراً ناجحاً يترك انطباعاً قوياً لدى الحضور.' : 'We provide complete equipment for conferences and seminars with the latest technologies. From large LED screens to professional sound systems and advanced lighting, we ensure your conference is successful and leaves a lasting impression on your attendees.' }}
                </p>
                
                <!-- Features -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-blue-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'شاشات LED' : 'LED Screens' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'جميع المقاسات بدقة 4K و8K' : 'All sizes with 4K and 8K resolution' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-blue-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'أنظمة صوتية' : 'Sound Systems' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'معدات احترافية من أفضل العلامات التجارية' : 'Professional equipment from top commercial brands' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-blue-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'إضاءة احترافية' : 'Professional Lighting' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'أنظمة إضاءة متطورة مع تأثيرات بصرية' : 'Advanced lighting systems with visual effects' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-blue-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'الترجمة الفورية' : 'Simultaneous Translation' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نظام ترجمة فورية لعدة لغات' : 'Real-time translation system for multiple languages' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('quote') }}?service=conferences" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-blue-700 transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
                    </a>
                    <a href="{{ route('gallery') }}#conferences" class="border-2 border-blue-600 text-blue-600 px-6 py-3 rounded-lg font-bold hover:bg-blue-600 hover:text-white transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'معرض الصور' : 'View Gallery' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Exhibition Stands Section -->
<section id="exhibitions" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div data-aos="fade-right">
                <div class="mb-6">
                    <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-bold">
                        {{ app()->getLocale() == 'ar' ? 'تصميم مبتكر' : 'Innovative Design' }}
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ app()->getLocale() == 'ar' ? 'تصميم وبناء أجنحة معارض' : 'Exhibition Stand Design & Construction' }}
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? 'نصمم وننفذ أجنحة معارض مبتكرة تجذب الانتباه وتبرز هوية علامتكم التجارية. من التصميم ثلاثي الأبعاد إلى التنفيذ النهائي، نضمن لكم جناحاً استثنائياً يترك انطباعاً دائماً لدى الزوار.' : 'We design and build innovative exhibition stands that attract attention and enhance your commercial brand. From 3D design to final implementation, we ensure your stand stands out and leaves a lasting impression on your visitors.' }}
                </p>
                
                <!-- Features -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-green-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'تصميم ثلاثي الأبعاد' : '3D Design' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'تصاميم واقعية قبل التنفيذ' : 'Realistic designs before implementation' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-green-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'مواد عالية الجودة' : 'High Quality Materials' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'أفضل المواد والتقنيات الحديثة' : 'Best materials and latest technologies' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-green-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'تركيب سريع' : 'Quick Installation' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'تركيب سريع في الوقت المحدد' : 'Quick installation within deadline' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-green-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'صيانة ودعم' : 'Maintenance & Support' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'خدمة صيانة مستمرة طوال فترة المعرض' : 'Continuous maintenance service throughout the exhibition' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('quote') }}?service=exhibitions" class="bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
                    </a>
                    <a href="{{ route('gallery') }}#exhibitions" class="border-2 border-green-600 text-green-600 px-6 py-3 rounded-lg font-bold hover:bg-green-600 hover:text-white transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'معرض الصور' : 'View Gallery' }}
                    </a>
                </div>
            </div>
            
            <div data-aos="fade-left">
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('assets/images/exhibitions/stand1.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'جناح معرض 1' : 'Exhibition Stand 1' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/exhibitions/stand2.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'جناح معرض 2' : 'Exhibition Stand 2' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/exhibitions/stand3.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'جناح معرض 3' : 'Exhibition Stand 3' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/exhibitions/stand4.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'جناح معرض 4' : 'Exhibition Stand 4' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
<section id="events" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div class="order-2 lg:order-1" data-aos="fade-right">
                <div class="grid grid-cols-2 gap-4">
                    <img src="{{ asset('assets/images/events/event1.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'حفلة 1' : 'Event 1' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/events/event2.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'حفلة 2' : 'Event 2' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/events/event3.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'حفلة 3' : 'Event 3' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                    <img src="{{ asset('assets/images/events/event4.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'حفلة 4' : 'Event 4' }}" class="rounded-lg shadow-lg w-full h-48 object-cover">
                </div>
            </div>
            
            <div class="order-1 lg:order-2" data-aos="fade-left">
                <div class="mb-6">
                    <span class="bg-purple-100 text-purple-600 px-4 py-2 rounded-full text-sm font-bold">
                        {{ app()->getLocale() == 'ar' ? 'تنظيم متكامل' : 'Complete Organization' }}
                    </span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ app()->getLocale() == 'ar' ? 'تجهيز الحفلات والمناسبات' : 'Event Setup & Management' }}
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    {{ app()->getLocale() == 'ar' ? 'ننظم ونجهز جميع أنواع الحفلات والمناسبات الرسمية والخاصة. من الأفراح إلى حفلات الشركات والمناسبات الخاصة، نقدم لكم تجربة لا تُنسى باهتمام بكل التفاصيل الصغيرة.' : 'We organize and setup all types of parties and official and private occasions. From corporate events to private parties, we provide you with an unforgettable experience, taking care of every small detail.' }}
                </p>
                
                <!-- Features -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-purple-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'تنسيق الزهور' : 'Flower Decoration' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'تصاميم زهور فاخرة وأنيقة' : 'Elegant and beautiful flower arrangements' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-purple-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'الديكور والإضاءة' : 'Decor & Lighting' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'ديكورات احترافية مع إضاءة سحرية' : 'Professional decorations with magical lighting' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-purple-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'تجهيزات الطعام' : 'Catering Services' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'تجهيزات كاملة للطعام والشراب' : 'Complete food and beverage services' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-purple-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'الموسيقى والترفيه' : 'Entertainment & Music' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'فرق موسيقية وبرامج ترفيهية' : 'Live bands and entertainment programs' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 space-x-reverse">
                        <i class="fas fa-check-circle text-purple-600 text-xl mt-1"></i>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'تجهيزات الطعام' : 'Event Equipment' }}</h4>
                            <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'تجهيزات كاملة للطعام والشراب' : 'Complete food and beverage equipment' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('quote') }}?service=events" class="bg-purple-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-purple-700 transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
                    </a>
                    <a href="{{ route('gallery') }}#events" class="border-2 border-purple-600 text-purple-600 px-6 py-3 rounded-lg font-bold hover:bg-purple-600 hover:text-white transition-colors">
                        {{ app()->getLocale() == 'ar' ? 'معرض الصور' : 'View Gallery' }}
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
@endsection
