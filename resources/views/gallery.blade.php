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
    <section class="bg-white shadow-md border-b">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center items-center py-4">
                <div class="flex flex-wrap gap-2 justify-center">
                    <button id="btn-all" 
                            class="px-6 py-2 rounded-full font-medium transition-all duration-300 bg-red-600 text-white">
                        <i class="fas fa-th ml-2"></i>{{ app()->getLocale() == 'ar' ? 'الكل' : 'All' }}
                    </button>
                    <button id="btn-images" 
                            class="px-6 py-2 rounded-full font-medium transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300">
                        <i class="fas fa-image ml-2"></i>{{ app()->getLocale() == 'ar' ? 'الصور' : 'Images' }}
                    </button>
                    <button id="btn-videos" 
                            class="px-6 py-2 rounded-full font-medium transition-all duration-300 bg-gray-200 text-gray-700 hover:bg-gray-300">
                        <i class="fas fa-video ml-2"></i>{{ app()->getLocale() == 'ar' ? 'الفيديوهات' : 'Videos' }}
                    </button>
                </div>
            </div>
        </div>
    </section>

<!-- Media Gallery Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-gray-50">
    <div class="container mx-auto px-4">
        
        <!-- Images Section -->
        <div class="relative">
            <!-- Section Header -->
            <div class="w-auto text-right mb-12" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-xl font-bold text-gray-900">
                    <span class="text-blue-600">
                        <i class="fas fa-image ml-2"></i>
                        {{ app()->getLocale() == 'ar' ? 'صور' : 'Images' }}
                    </span>
                </h2>
            </div>
            
            <!-- Images Gallery -->
            <div id="images-gallery" 
                 class="gallery-items"
                 data-aos="fade-up" data-aos-delay="100">
                @php
                    $projects = \App\Models\Portfolio::where('is_active', true)->get();
                @endphp
                @if($projects->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                        @foreach($projects as $project)
                            @if($project->images)
                            <div class="relative group cursor-pointer transform transition-all duration-300 hover:scale-105" 
                                 onclick="openLightbox('{{ asset('storage/' . $project->images) }}', '{{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}', '{{ app()->getLocale() == 'ar' ? $project->description_ar : $project->description_en }}')">
                                <!-- Image Container -->
                                <div class="relative w-full h-40 overflow-hidden rounded-lg shadow-md border border-gray-200">
                                    <img src="{{ asset('storage/' . $project->images) }}" 
                                         alt="{{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}" 
                                         class="w-full h-full object-cover transition-all duration-300 group-hover:scale-110 group-hover:brightness-90">
                                    
                                    <!-- Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    
                                    <!-- Search Icon -->
                                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <div class="bg-white/90 backdrop-blur-sm text-gray-800 p-2 rounded-full shadow-md">
                                            <i class="fas fa-search-plus text-sm"></i>
                                        </div>
                                    </div>
                                    
                                    <!-- Title -->
                                    <div class="absolute bottom-0 left-0 right-0 p-2 text-white transform transition-all duration-300 group-hover:translate-y-0">
                                        <h4 class="text-xs font-bold truncate">
                                            {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16 bg-white rounded-2xl shadow-lg border border-gray-200">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-50 to-blue-100 rounded-full mb-6 shadow-lg">
                            <i class="fas fa-image text-blue-400 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">
                            {{ app()->getLocale() == 'ar' ? 'لا توجد صور حالياً' : 'No images available' }}
                        </h3>
                        <p class="text-gray-600">
                            {{ app()->getLocale() == 'ar' ? 'سيتم إضافة الصور قريباً' : 'Images will be added soon' }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Divider -->
        <div class="relative mb-16">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-gradient-to-r from-gray-50 to-white px-6 text-gray-500 text-sm font-medium">
                    {{ app()->getLocale() == 'ar' ? 'أو' : 'OR' }}
                </span>
            </div>
        </div>
        
        <!-- Videos Section -->
        <div class="flex justify-start">
            <!-- Section Header -->
            <div class="w-auto text-right mb-12" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-xl font-bold text-gray-900">
                    <span class="text-purple-600">
                        <i class="fas fa-video mr-2"></i>
                        {{ app()->getLocale() == 'ar' ? 'فيديوهات' : 'Videos' }}
                    </span>
                </h2>
            </div>
            
            <!-- Videos Gallery -->
            <div id="videos-gallery"
                 class="gallery-items"
                 data-aos="fade-up" data-aos-delay="300">
                @php
                    $projects = \App\Models\Portfolio::where('is_active', true)->get();
                @endphp
                @if($projects->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                        @foreach($projects as $project)
                            @if($project->videos)
                            <div class="relative group cursor-pointer transform transition-all duration-300 hover:scale-105" 
                                 onclick="openVideoLightbox('{{ asset('storage/' . $project->videos) }}', '{{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}')">
                                <!-- Video Container -->
                                <div class="relative w-full h-40 overflow-hidden rounded-lg shadow-md border border-gray-200 bg-black">
                                    <video class="w-full h-full object-cover" 
                                           poster="{{ asset('storage/' . $project->videos) }}"
                                           controls>
                                        <source src="{{ asset('storage/' . $project->videos) }}" type="video/mp4">
                                        {{ app()->getLocale() == 'ar' ? 'متصفحك لا يدعم تشغيل الفيديو' : 'Your browser does not support video playback' }}
                                    </video>
                                    
                                    <!-- Video Badge -->
                                    <div class="absolute top-2 left-2">
                                        <span class="inline-flex items-center bg-purple-600 text-white px-2 py-0.5 rounded-full text-xs font-bold">
                                            <i class="fas fa-video mr-1"></i>
                                            {{ app()->getLocale() == 'ar' ? 'فيديو' : 'Video' }}
                                        </span>
                                    </div>
                                    
                                    <!-- Play Button -->
                                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <div class="bg-white/90 backdrop-blur-sm text-purple-800 p-2 rounded-full shadow-md">
                                            <i class="fas fa-play text-xs ml-0.5"></i>
                                        </div>
                                    </div>
                                    
                                    <!-- Title -->
                                    <div class="absolute bottom-0 left-0 right-0 p-2 text-white transform transition-all duration-300 group-hover:translate-y-0">
                                        <h4 class="text-xs font-bold truncate">
                                            {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16 bg-white rounded-2xl shadow-lg border border-gray-200">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-50 to-purple-100 rounded-full mb-6 shadow-lg">
                            <i class="fas fa-video text-purple-400 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">
                            {{ app()->getLocale() == 'ar' ? 'لا توجد فيديوهات حالياً' : 'No videos available' }}
                        </h3>
                        <p class="text-gray-600">
                            {{ app()->getLocale() == 'ar' ? 'سيتم إضافة الفيديوهات قريباً' : 'Videos will be added soon' }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
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
