@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'معرض أعمالنا - وقت الحدث' : 'Our Projects Gallery - Event Time')

@section('content')
<!-- Modern Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900">
        <div class="absolute inset-0 bg-black/30"></div>
        <!-- Floating Particles -->
        <div class="particles-container">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
            <div class="particle particle-5"></div>
        </div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 text-center px-4">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white mb-6 tracking-tight" data-aos="fade-up" data-aos-duration="1000">
                <span class="bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 bg-clip-text text-transparent animate-gradient">
                    {{ app()->getLocale() == 'ar' ? 'معرض أعمالنا' : 'Our Gallery' }}
                </span>
            </h1>
            <p class="text-xl md:text-2xl lg:text-3xl text-gray-200 mb-8 max-w-4xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                {{ app()->getLocale() == 'ar' ? 'نحول أفكارك إلى واقع مذهل' : 'We transform your ideas into stunning reality' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                <button onclick="scrollToGallery()" class="group relative px-8 py-4 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-bold rounded-full overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <span class="relative z-10 flex items-center">
                        <i class="fas fa-images ml-2 group-hover:animate-bounce"></i>
                        {{ app()->getLocale() == 'ar' ? 'استعرض أعمالنا' : 'View Our Work' }}
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
                <a href="{{ route('contact') }}" class="group relative px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full transform transition-all duration-300 hover:scale-105 hover:bg-white hover:text-purple-900">
                    <i class="fas fa-phone ml-2 group-hover:rotate-12 transition-transform"></i>
                    {{ app()->getLocale() == 'ar' ? 'تواصل معنا' : 'Contact Us' }}
                </a>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
        </div>
    </div>
</section>

<!-- Modern Filter Section -->
<section class="py-16 bg-gradient-to-r from-gray-900 via-purple-900 to-gray-900 sticky top-0 z-40 backdrop-blur-lg border-b border-purple-500/20">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center items-center gap-4">
            <div class="flex flex-wrap gap-3 justify-center">
                <button id="btn-all" 
                        class="group relative px-8 py-3 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-bold rounded-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-purple-500/50">
                    <span class="relative z-10 flex items-center">
                        <i class="fas fa-th ml-2 group-hover:rotate-180 transition-transform duration-500"></i>
                        {{ app()->getLocale() == 'ar' ? 'الكل' : 'All' }}
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
                <button id="btn-images" 
                        class="group relative px-8 py-3 bg-gray-800 text-gray-300 font-bold rounded-full transform transition-all duration-300 hover:scale-105 hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:shadow-xl hover:shadow-blue-500/50">
                    <span class="relative z-10 flex items-center">
                        <i class="fas fa-image ml-2 group-hover:animate-pulse"></i>
                        {{ app()->getLocale() == 'ar' ? 'الصور' : 'Images' }}
                    </span>
                </button>
                <button id="btn-videos" 
                        class="group relative px-8 py-3 bg-gray-800 text-gray-300 font-bold rounded-full transform transition-all duration-300 hover:scale-105 hover:bg-gradient-to-r hover:from-red-500 hover:to-orange-500 hover:text-white hover:shadow-xl hover:shadow-red-500/50">
                    <span class="relative z-10 flex items-center">
                        <i class="fas fa-video ml-2 group-hover:animate-pulse"></i>
                        {{ app()->getLocale() == 'ar' ? 'الفيديوهات' : 'Videos' }}
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Stunning Gallery Section -->
<section id="gallery-section" class="py-20 bg-gradient-to-br from-gray-900 via-purple-900/20 to-gray-900">
    <div class="container mx-auto px-4">
        
        <!-- Images Gallery -->
        <div id="images-gallery" class="gallery-section mb-20">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                    <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                        {{ app()->getLocale() == 'ar' ? 'صور مشاريعنا' : 'Our Project Images' }}
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-400 to-cyan-400 mx-auto rounded-full"></div>
            </div>
            
            @php
                $projects = \App\Models\Portfolio::where('is_active', true)->get();
            @endphp
            @if($projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($projects as $project)
                        @if($project->images)
                        <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <!-- Main Image Container -->
                            <div class="relative overflow-hidden rounded-2xl shadow-2xl transform transition-all duration-500 hover:scale-105 hover:shadow-3xl hover:shadow-blue-500/20">
                                <img src="{{ asset('storage/' . $project->images) }}" 
                                     alt="{{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}" 
                                     class="w-full h-64 object-cover transition-all duration-700 group-hover:scale-110">
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                
                                <!-- Floating Action Buttons -->
                                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-x-4 group-hover:translate-x-0">
                                    <button onclick="openLightbox('{{ asset('storage/' . $project->images) }}', '{{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}', '{{ app()->getLocale() == 'ar' ? $project->description_ar : $project->description_en }}')" 
                                            class="bg-white/90 backdrop-blur-sm text-gray-800 p-3 rounded-full shadow-lg hover:bg-white hover:scale-110 transition-all duration-300">
                                        <i class="fas fa-search-plus"></i>
                                    </button>
                                </div>
                                
                                <!-- Project Info -->
                                <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                                    <h3 class="text-white font-bold text-lg mb-2">
                                        {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                                    </h3>
                                    <p class="text-gray-300 text-sm line-clamp-2">
                                        {{ app()->getLocale() == 'ar' ? $project->description_ar : $project->description_en }}
                                    </p>
                                </div>
                                
                                <!-- Shimmer Effect -->
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-gradient-to-br from-gray-800/50 to-gray-900/50 rounded-3xl border border-gray-700 backdrop-blur-lg">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-blue-500/20 to-cyan-500/20 rounded-full mb-6 shadow-2xl shadow-blue-500/20">
                        <i class="fas fa-image text-blue-400 text-4xl animate-pulse"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">
                        {{ app()->getLocale() == 'ar' ? 'سيتم إضافة الأعمال قريباً' : 'Coming Soon' }}
                    </h3>
                    <p class="text-gray-400 text-lg">
                        {{ app()->getLocale() == 'ar' ? 'نحن نجهز أفضل أعمالنا لعرضها عليك' : 'We are preparing our best work to show you' }}
                    </p>
                </div>
            @endif
        </div>
        
        <!-- Videos Gallery -->
        <div id="videos-gallery" class="gallery-section">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                    <span class="bg-gradient-to-r from-red-400 to-orange-400 bg-clip-text text-transparent">
                        {{ app()->getLocale() == 'ar' ? 'فيديوهات مشاريعنا' : 'Our Project Videos' }}
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-red-400 to-orange-400 mx-auto rounded-full"></div>
            </div>
            
            @if($projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($projects as $project)
                        @if($project->videos)
                        <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <!-- Video Container -->
                            <div class="relative overflow-hidden rounded-2xl shadow-2xl transform transition-all duration-500 hover:scale-105 hover:shadow-3xl hover:shadow-red-500/20">
                                <div class="relative h-64 bg-black">
                                    <video class="w-full h-full object-cover" 
                                           poster="{{ asset('storage/' . $project->videos) }}"
                                           muted
                                           loop>
                                        <source src="{{ asset('storage/' . $project->videos) }}" type="video/mp4">
                                    </video>
                                    
                                    <!-- Video Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                    
                                    <!-- Play Button -->
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <button onclick="openVideoLightbox('{{ asset('storage/' . $project->videos) }}', '{{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}')" 
                                                class="group/btn bg-red-600 text-white p-6 rounded-full shadow-2xl transform transition-all duration-300 hover:scale-110 hover:bg-red-700 hover:shadow-red-500/50">
                                            <i class="fas fa-play text-2xl ml-1 group-hover/btn:animate-pulse"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Video Badge -->
                                    <div class="absolute top-4 left-4">
                                        <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold flex items-center">
                                            <i class="fas fa-video mr-2 animate-pulse"></i>
                                            {{ app()->getLocale() == 'ar' ? 'فيديو' : 'Video' }}
                                        </span>
                                    </div>
                                    
                                    <!-- Project Title -->
                                    <div class="absolute bottom-4 left-4 right-4">
                                        <h3 class="text-white font-bold text-lg">
                                            {{ app()->getLocale() == 'ar' ? $project->title_ar : $project->title_en }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-gradient-to-br from-gray-800/50 to-gray-900/50 rounded-3xl border border-gray-700 backdrop-blur-lg">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-red-500/20 to-orange-500/20 rounded-full mb-6 shadow-2xl shadow-red-500/20">
                        <i class="fas fa-video text-red-400 text-4xl animate-pulse"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">
                        {{ app()->getLocale() == 'ar' ? 'سيتم إضافة الفيديوهات قريباً' : 'Videos Coming Soon' }}
                    </h3>
                    <p class="text-gray-400 text-lg">
                        {{ app()->getLocale() == 'ar' ? 'نحن نجهز أفضل فيديوهات أعمالنا لعرضها عليك' : 'We are preparing our best work videos to show you' }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Modern Stats Section -->
<section class="py-20 bg-gradient-to-r from-purple-900 via-pink-900 to-red-900 relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-pink-500/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div data-aos="zoom-in" data-aos-delay="100">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                    <div class="text-5xl md:text-6xl font-black bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent mb-4">500+</div>
                    <p class="text-white font-medium">{{ app()->getLocale() == 'ar' ? 'مشروع منجز' : 'Projects Done' }}</p>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="200">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                    <div class="text-5xl md:text-6xl font-black bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent mb-4">10+</div>
                    <p class="text-white font-medium">{{ app()->getLocale() == 'ar' ? 'سنوات خبرة' : 'Years Experience' }}</p>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="300">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                    <div class="text-5xl md:text-6xl font-black bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent mb-4">50+</div>
                    <p class="text-white font-medium">{{ app()->getLocale() == 'ar' ? 'عميل سعيد' : 'Happy Clients' }}</p>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="400">
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20">
                    <div class="text-5xl md:text-6xl font-black bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-4">24/7</div>
                    <p class="text-white font-medium">{{ app()->getLocale() == 'ar' ? 'دعم فني' : 'Support' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern CTA Section -->
<section class="py-20 bg-gradient-to-br from-gray-900 via-purple-900 to-gray-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-32 h-32 bg-pink-500/20 rounded-full animate-bounce"></div>
        <div class="absolute bottom-10 right-10 w-24 h-24 bg-blue-500/20 rounded-full animate-bounce delay-500"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-purple-500/20 rounded-full animate-pulse"></div>
    </div>
    
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="max-w-4xl mx-auto" data-aos="fade-up">
            <h2 class="text-4xl md:text-6xl font-black text-white mb-6">
                <span class="bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 bg-clip-text text-transparent">
                    {{ app()->getLocale() == 'ar' ? 'هل أنت مستعد؟' : 'Ready to Start?' }}
                </span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-300 mb-12">
                {{ app()->getLocale() == 'ar' ? 'دعنا نحول حلمك إلى واقع' : 'Let us transform your dream into reality' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="https://wa.me/966500000000?text={{ app()->getLocale() == 'ar' ? 'أريد استفسار عن خدماتكم' : 'I want to inquire about your services' }}" target="_blank" 
                   class="group relative px-10 py-5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-black text-lg rounded-full overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-green-500/50">
                    <span class="relative z-10 flex items-center">
                        <i class="fab fa-whatsapp text-2xl ml-3 group-hover:animate-bounce"></i>
                        {{ app()->getLocale() == 'ar' ? 'تواصل الآن' : 'Contact Now' }}
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-green-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                <a href="{{ route('contact') }}" 
                   class="group relative px-10 py-5 bg-transparent border-2 border-white text-white font-black text-lg rounded-full transform transition-all duration-300 hover:scale-105 hover:bg-white hover:text-purple-900">
                    <i class="fas fa-calendar text-2xl ml-3 group-hover:rotate-12 transition-transform"></i>
                    {{ app()->getLocale() == 'ar' ? 'احجز موعد' : 'Book Appointment' }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Lightbox Modals -->
<div id="imageLightbox" class="fixed inset-0 bg-black/95 z-50 hidden flex items-center justify-center p-4 backdrop-blur-sm">
    <div class="relative max-w-7xl w-full">
        <button onclick="closeLightbox()" class="absolute -top-16 right-0 text-white hover:text-red-500 transition-all duration-300 transform hover:scale-110">
            <i class="fas fa-times text-4xl"></i>
        </button>
        <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl overflow-hidden shadow-2xl border border-gray-700">
            <img id="lightboxImage" src="" alt="" class="w-full max-h-[80vh] object-contain">
            <div class="p-8 text-center">
                <h3 id="imageTitle" class="text-white text-3xl font-bold mb-4"></h3>
                <p id="imageDescription" class="text-gray-300 text-lg"></p>
            </div>
        </div>
    </div>
</div>

<div id="videoLightbox" class="fixed inset-0 bg-black/95 z-50 hidden flex items-center justify-center p-4 backdrop-blur-sm">
    <div class="relative max-w-7xl w-full">
        <button onclick="closeVideoLightbox()" class="absolute -top-16 right-0 text-white hover:text-red-500 transition-all duration-300 transform hover:scale-110">
            <i class="fas fa-times text-4xl"></i>
        </button>
        <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl overflow-hidden shadow-2xl border border-gray-700">
            <video id="lightboxVideo" class="w-full max-h-[80vh]" controls autoplay>
                <source src="" type="video/mp4">
                {{ app()->getLocale() == 'ar' ? 'متصفحك لا يدعم تشغيل الفيديو' : 'Your browser does not support video playback' }}
            </video>
            <div class="p-8 text-center">
                <h3 id="videoTitle" class="text-white text-3xl font-bold"></h3>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.animate-gradient {
    background-size: 200% 200%;
    animation: gradient 3s ease infinite;
}

.particles-container {
    position: absolute;
    inset: 0;
    overflow: hidden;
}

.particle {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.particle-1 { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
.particle-2 { width: 6px; height: 6px; left: 20%; animation-delay: 1s; }
.particle-3 { width: 3px; height: 3px; left: 30%; animation-delay: 2s; }
.particle-4 { width: 5px; height: 5px; left: 40%; animation-delay: 3s; }
.particle-5 { width: 4px; height: 4px; left: 50%; animation-delay: 4s; }

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gallery-section {
    opacity: 1;
    transform: translateY(0);
    transition: all 0.5s ease-in-out;
}

.gallery-section.hidden {
    opacity: 0;
    transform: translateY(20px);
    height: 0;
    overflow: hidden;
    margin: 0;
    padding: 0;
}

.delay-1000 {
    animation-delay: 1s;
}
</style>

<script>
// Smooth scroll to gallery
function scrollToGallery() {
    document.getElementById('gallery-section').scrollIntoView({ 
        behavior: 'smooth',
        block: 'start'
    });
}

// Enhanced Lightbox functions
function openLightbox(imageSrc, title, description) {
    document.getElementById('lightboxImage').src = imageSrc;
    document.getElementById('imageTitle').textContent = title;
    document.getElementById('imageDescription').textContent = description;
    document.getElementById('imageLightbox').classList.remove('hidden');
    document.getElementById('imageLightbox').classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('imageLightbox').classList.add('hidden');
    document.getElementById('imageLightbox').classList.remove('flex');
    document.body.style.overflow = 'auto';
}

function openVideoLightbox(videoSrc, title) {
    document.getElementById('lightboxVideo').src = videoSrc;
    document.getElementById('videoTitle').textContent = title;
    document.getElementById('videoLightbox').classList.remove('hidden');
    document.getElementById('videoLightbox').classList.add('flex');
    document.getElementById('lightboxVideo').play();
    document.body.style.overflow = 'hidden';
}

function closeVideoLightbox() {
    document.getElementById('lightboxVideo').pause();
    document.getElementById('lightboxVideo').src = '';
    document.getElementById('videoLightbox').classList.add('hidden');
    document.getElementById('videoLightbox').classList.remove('flex');
    document.body.style.overflow = 'auto';
}

// Enhanced Filter functionality
document.getElementById('btn-all').addEventListener('click', function() {
    showGallery('all');
    updateFilterButtons('all');
});

document.getElementById('btn-images').addEventListener('click', function() {
    showGallery('images');
    updateFilterButtons('images');
});

document.getElementById('btn-videos').addEventListener('click', function() {
    showGallery('videos');
    updateFilterButtons('videos');
});

function showGallery(type) {
    const imagesGallery = document.getElementById('images-gallery');
    const videosGallery = document.getElementById('videos-gallery');
    
    if (type === 'all') {
        imagesGallery.classList.remove('hidden');
        videosGallery.classList.remove('hidden');
    } else if (type === 'images') {
        imagesGallery.classList.remove('hidden');
        videosGallery.classList.add('hidden');
    } else if (type === 'videos') {
        imagesGallery.classList.add('hidden');
        videosGallery.classList.remove('hidden');
    }
}

function updateFilterButtons(active) {
    const buttons = ['btn-all', 'btn-images', 'btn-videos'];
    buttons.forEach(btn => {
        const button = document.getElementById(btn);
        if (btn === 'btn-' + active || (active === 'all' && btn === 'btn-all')) {
            button.className = 'group relative px-8 py-3 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-bold rounded-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-purple-500/50';
        } else {
            if (btn === 'btn-images') {
                button.className = 'group relative px-8 py-3 bg-gray-800 text-gray-300 font-bold rounded-full transform transition-all duration-300 hover:scale-105 hover:bg-gradient-to-r hover:from-blue-500 hover:to-cyan-500 hover:text-white hover:shadow-xl hover:shadow-blue-500/50';
            } else if (btn === 'btn-videos') {
                button.className = 'group relative px-8 py-3 bg-gray-800 text-gray-300 font-bold rounded-full transform transition-all duration-300 hover:scale-105 hover:bg-gradient-to-r hover:from-red-500 hover:to-orange-500 hover:text-white hover:shadow-xl hover:shadow-red-500/50';
            }
        }
    });
}

// Close on ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeLightbox();
        closeVideoLightbox();
    }
});

// Auto-play videos on hover
document.querySelectorAll('video').forEach(video => {
    video.parentElement.addEventListener('mouseenter', () => {
        video.play();
    });
    video.parentElement.addEventListener('mouseleave', () => {
        video.pause();
        video.currentTime = 0;
    });
});
</script>

@endsection
