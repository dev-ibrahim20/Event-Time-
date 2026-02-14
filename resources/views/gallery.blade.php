@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'معرض أعمالنا - وقت الحدث' : 'Our Projects Gallery - Event Time')
@section('description', app()->getLocale() == 'ar' ? 'معرض صور وفيديو لمشاريعنا في تجهيز المؤتمرات والمعارض والخيام الأوروبية والحفلات' : 'A showcase of our projects in conference, exhibition, European tent, and party setup')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-red-600 to-red-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'معرض أعمالنا' : 'Our Projects Gallery' }}
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-4xl mx-auto leading-relaxed">
                {{ app()->getLocale() == 'ar' ? 'نستعرض لكم أبرز مشاريعنا التي نفذها بفخر واحترافية في مختلف الفعاليات' : 'We showcase our best projects with excellence and professionalism across various events' }}
            </p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="sticky top-20 z-40 bg-white shadow-md border-b">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center items-center py-4" x-data="{ activeFilter: 'all' }">
            <div class="flex flex-wrap gap-2 justify-center">
                <button @click="activeFilter = 'all'" 
                        :class="activeFilter === 'all' ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition-all duration-300">
                    <i class="fas fa-th ml-2"></i>{{ app()->getLocale() == 'ar' ? 'الكل' : 'All' }}
                </button>
                <button @click="activeFilter = 'tents'" 
                        :class="activeFilter === 'tents' ? 'bg-red-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition-all duration-300">
                    <i class="fas fa-campground ml-2"></i>{{ app()->getLocale() == 'ar' ? 'الخيام الأوروبية' : 'European Tents' }}
                </button>
                <button @click="activeFilter = 'conferences'" 
                        :class="activeFilter === 'conferences' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition-all duration-300">
                    <i class="fas fa-users ml-2"></i>{{ app()->getLocale() == 'ar' ? 'المؤتمرات' : 'Conferences' }}
                </button>
                <button @click="activeFilter = 'exhibitions'" 
                        :class="activeFilter === 'exhibitions' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition-all duration-300">
                    <i class="fas fa-store ml-2"></i>{{ app()->getLocale() == 'ar' ? 'المعارض' : 'Exhibitions' }}
                </button>
                <button @click="activeFilter = 'events'" 
                        :class="activeFilter === 'events' ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition-all duration-300">
                    <i class="fas fa-glass-cheers ml-2"></i>{{ app()->getLocale() == 'ar' ? 'الحفلات' : 'Events' }}
                </button>
                <button @click="activeFilter = 'videos'" 
                        :class="activeFilter === 'videos' ? 'bg-orange-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                        class="px-6 py-2 rounded-full font-medium transition-all duration-300">
                    <i class="fas fa-video ml-2"></i>{{ app()->getLocale() == 'ar' ? 'الفيديوهات' : 'Videos' }}
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="gallery-grid" x-data="{ activeFilter: 'all' }">
            
            <!-- Featured Projects -->
            <div class="col-span-1 md:col-span-2 lg:col-span-3" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ app()->getLocale() == 'ar' ? 'المشاريع المميزة' : 'Featured Projects' }}</h2>
            </div>
            
            <!-- Featured Project 1 - Large -->
            <div class="col-span-1 md:col-span-2 lg:col-span-2 gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'tents' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="100">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/tents/featured1.jpg') }}')">
                    <img src="{{ asset('assets/images/tents/featured1.jpg') }}" 
                         alt="Featured Tent Project" 
                         class="w-full h-96 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <span class="bg-red-600 px-3 py-1 rounded-full text-xs font-bold mb-2 inline-block">
                                {{ app()->getLocale() == 'ar' ? 'الخيام الأوروبية' : 'European Tents' }}
                            </span>
                            <h3 class="text-xl font-bold mb-2">{{ app()->getLocale() == 'ar' ? 'مؤتمر القمة العربية 2024' : 'Conference of the Arab Summit 2024' }}</h3>
                            <p class="text-sm text-gray-200">{{ app()->getLocale() == 'ar' ? 'خيمة رئيسية بمساحة 2000م للقمة العربية' : 'Main tent with an area of 2000m for the Arab Summit' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Featured Project 2 -->
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'conferences' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="200">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/conferences/featured1.jpg') }}')">
                    <img src="{{ asset('assets/images/conferences/featured1.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'مشروع مؤتمر مميز' : 'Featured Conference Project' }}" 
                         class="w-full h-96 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <span class="bg-blue-600 px-3 py-1 rounded-full text-xs font-bold mb-2 inline-block">
                                {{ app()->getLocale() == 'ar' ? 'المؤتمرات' : 'Conferences' }}
                            </span>
                            <h3 class="text-lg font-bold">{{ app()->getLocale() == 'ar' ? 'مؤتمر التقنية الدولي' : 'International Technology Conference' }}</h3>
                            <p class="text-sm text-gray-200">{{ app()->getLocale() == 'ar' ? 'تجهيز كامل بشاشات LED' : 'Complete setup with LED screens' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Regular Gallery Items -->
            <div class="col-span-1 md:col-span-2 lg:col-span-3 mt-12" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ app()->getLocale() == 'ar' ? 'جميع المشاريع' : 'All Projects' }}</h2>
            </div>
            
            <!-- Tents Gallery -->
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'tents' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="300">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/tents/tent1.jpg') }}')">
                    <img src="{{ asset('assets/images/tents/tent1.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'خيمة أوروبية 1' : 'European Tent 1' }}" 
                         class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
            </div>
            
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'tents' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="400">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/tents/tent2.jpg') }}')">
                    <img src="{{ asset('assets/images/tents/tent2.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'خيمة أوروبية 2' : 'European Tent 2' }}" 
                         class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
            </div>
            
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'tents' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="500">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/tents/tent3.jpg') }}')">
                    <img src="{{ asset('assets/images/tents/tent3.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'خيمة أوروبية 3' : 'European Tent 3' }}" 
                         class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
            </div>
            
            <!-- Conferences Gallery -->
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'conferences' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="600">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/conferences/conf1.jpg') }}')">
                    <img src="{{ asset('assets/images/conferences/conf1.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'مؤتمر 1' : 'Conference 1' }}" 
                         class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
            </div>
            
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'conferences' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="700">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/conferences/conf2.jpg') }}')">
                    <img src="{{ asset('assets/images/conferences/conf2.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'مؤتمر 2' : 'Conference 2' }}" 
                         class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
            </div>
            
            <!-- Exhibitions Gallery -->
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'exhibitions' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="800">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/exhibitions/stand1.jpg') }}')">
                    <img src="{{ asset('assets/images/exhibitions/stand1.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'جناح معرض 1' : 'Exhibition Stand 1' }}" 
                         class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
            </div>
            
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'exhibitions' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="900">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/exhibitions/stand2.jpg') }}')">
                    <img src="{{ asset('assets/images/exhibitions/stand2.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'جناح معرض 2' : 'Exhibition Stand 2' }}" 
                         class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
            </div>
            
            <!-- Events Gallery -->
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'events' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="1000">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/events/event1.jpg') }}')">
                    <img src="{{ asset('assets/images/events/event1.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'حفلة 1' : 'Event 1' }}" 
                         class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
            </div>
            
            <div class="gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'events' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="1100">
                <div class="relative group cursor-pointer" onclick="openLightbox('{{ asset('assets/images/events/event2.jpg') }}')">
                    <img src="{{ asset('assets/images/events/event2.jpg') }}" 
                         alt="{{ app()->getLocale() == 'ar' ? 'حفلة 2' : 'Event 2' }}" 
                         class="w-full h-64 object-cover rounded-lg shadow-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
            </div>
            
            <!-- Videos Section -->
            <div class="col-span-1 md:col-span-2 lg:col-span-3 mt-12" 
                 :class="activeFilter === 'all' || activeFilter === 'videos' ? 'block' : 'hidden'"
                 data-aos="fade-up">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ app()->getLocale() == 'ar' ? 'الفيديوهات' : 'Videos' }}</h2>
            </div>
            
            <div class="col-span-1 md:col-span-2 lg:col-span-3 gallery-item" 
                 :class="activeFilter === 'all' || activeFilter === 'videos' ? 'block' : 'hidden'"
                 data-aos="fade-up" data-aos-delay="1200">
                <div class="relative group cursor-pointer rounded-lg shadow-lg overflow-hidden">
                    <video class="w-full h-96 object-cover" controls poster="{{ asset('assets/videos/video1-poster.jpg') }}">
                        <source src="{{ asset('assets/videos/project1.mp4') }}" type="video/mp4">
                        {{ app()->getLocale() == 'ar' ? 'متصفحك لا يدعم تشغيل الفيديو' : 'Your browser does not support video playback' }}
                    </video>
                    <div class="absolute top-4 left-4 bg-orange-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                        {{ app()->getLocale() == 'ar' ? 'فيديو' : 'Video' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Load More Button -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 text-center">
        <button onclick="loadMoreGallery()" class="bg-red-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-red-700 transition-colors transform hover:scale-105">
            <i class="fas fa-plus ml-2"></i>{{ app()->getLocale() == 'ar' ? 'تحميل المزيد' : 'Load More' }}
        </button>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-gradient-to-r from-gray-900 to-gray-800 text-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl md:text-5xl font-bold text-red-500 mb-2">500+</div>
                <p class="text-gray-300">{{ app()->getLocale() == 'ar' ? 'مشروع منجز' : 'Completed Projects' }}</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl md:text-5xl font-bold text-red-500 mb-2">10+</div>
                <p class="text-gray-300">{{ app()->getLocale() == 'ar' ? 'سنوات خبرة' : 'Years of Experience' }}</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="300">
                <div class="text-4xl md:text-5xl font-bold text-red-500 mb-2">50+</div>
                <p class="text-gray-300">{{ app()->getLocale() == 'ar' ? 'عميل سعيد' : 'Happy Clients' }}</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="400">
                <div class="text-4xl md:text-5xl font-bold text-red-500 mb-2">24/7</div>
                <p class="text-gray-300">{{ app()->getLocale() == 'ar' ? 'دعم فني' : 'Technical Support' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-red-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'هل أنت مستعد للانضمام إلى قائمة عملائنا السعداء؟' : '?Are you ready to join our list of happy clients' }}
            </h2>
            <p class="text-xl mb-8 text-red-100">
                {{ app()->getLocale() == 'ar' ? 'تواصل معنا الآن وابدأ مشروعك القادم مع فريق من الخبراء' : 'Contact us now and start your next project with a team of experts' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quote') }}" class="bg-white text-red-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fas fa-file-invoice ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'ابدأ مشروعك' : 'Start Your Project' }}
                </a>
                <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-bold hover:bg-white hover:text-red-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-phone ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'استشارة مجانية' : 'Free Consultation' }}
                </a>
            </div>
        </div>
    </div>
</section>

@include('partials.clients-simple')
@endsection
