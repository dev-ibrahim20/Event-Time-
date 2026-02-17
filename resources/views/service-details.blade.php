@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'تفاصيل الخدمة - ' . (isset($service) ? $service->title_ar : '') : 'Service Details - ' . (isset($service) ? $service->title_en : ''))

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 overflow-hidden" id="heroSection">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse floating-shape" style="animation-duration: 4s;"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse floating-shape" style="animation-duration: 6s; animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-indigo-500/10 rounded-full blur-2xl floating-shape" style="animation-duration: 5s; animation-delay: 2s;"></div>
        <div class="absolute top-1/3 right-1/3 w-80 h-80 bg-pink-500/10 rounded-full blur-3xl floating-shape" style="animation-duration: 7s; animation-delay: 3s;"></div>
        <div class="absolute bottom-1/4 left-1/3 w-72 h-72 bg-cyan-500/10 rounded-full blur-2xl floating-shape" style="animation-duration: 8s; animation-delay: 4s;"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6" data-aos="fade-up">
                @if(isset($service))
                    {{ app()->getLocale() == 'ar' ? 'تفاصيل ' . $service->title_ar : 'Service Details for ' . $service->title_en }}
                @else
                    {{ app()->getLocale() == 'ar' ? 'تفاصيل الخدمة' : 'Service Details' }}
                @endif
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8" data-aos="fade-up" data-aos-delay="200">
                {{ app()->getLocale() == 'ar' ? 'اكتشف خدماتنا المتميزة' : 'Discover our premium services' }}
            </p>
        </div>
    </div>
</section>

<!-- Service Details Section -->
@if(isset($service))
    <div class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 gap-12">
                
                <!-- Service Info -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-8 shadow-xl border border-gray-200" data-aos="fade-right">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-concierge-bell text-blue-600 mr-3"></i>
                            {{ app()->getLocale() == 'ar' ? $service->title_ar : $service->title_en }}
                        </h2>
                        <div class="bg-blue-600 text-white px-4 py-2 rounded-lg inline-block">
                            <h3 class="text-2xl font-bold">
                                {{ app()->getLocale() == 'ar' ? $service->title_ar : $service->title_en }}
                            </h3>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">{{ app()->getLocale() == 'ar' ? 'الوصف' : 'Description' }}</h4>
                                <p class="text-gray-600 mt-2">
                                    {{ app()->getLocale() == 'ar' ? $service->description_ar : $service->description_en }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-star text-yellow-500 mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-semibold text-gray-900">{{ app()->getLocale() == 'ar' ? 'المميزات' : 'Features' }}</h4>
                                <ul class="text-gray-600 mt-2 space-y-2">
                                    @if($service->features && is_array($service->features))
                                        @foreach ($service->features as $index => $feature)
                                            @if($index < 6) <!-- Show first 6 features -->
                                                <div class="flex items-center space-x-2 space-x-reverse">
                                                    <i class="fas fa-check-circle text-red-600 text-sm mt-0.5 flex-shrink-0"></i>
                                                    <p class="text-sm text-gray-600">{{ $feature }}</p>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <!-- Fallback features if none exist -->
                                        <div class="flex items-center space-x-2 space-x-reverse">
                                            <i class="fas fa-check-circle text-red-600 text-sm mt-0.5 flex-shrink-0"></i>
                                            <p class="text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'خدمة احترافية ومتميزة' : 'Professional and premium service' }}</p>
                                        </div>
                                        <div class="flex items-center space-x-2 space-x-reverse">
                                            <i class="fas fa-check-circle text-red-600 text-sm mt-0.5 flex-shrink-0"></i>
                                            <p class="text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'فريق عمل متخصص' : 'Specialized team' }}</p>
                                        </div>
                                        <div class="flex items-center space-x-2 space-x-reverse">
                                            <i class="fas fa-check-circle text-red-600 text-sm mt-0.5 flex-shrink-0"></i>
                                            <p class="text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'جودة عالية' : 'High quality' }}</p>
                                        </div>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Professional Image Gallery -->
    <div class="w-full bg-gradient-to-br from-gray-900 to-gray-800 py-8" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">
                <i class="fas fa-images text-yellow-400 mr-3"></i>
                {{ app()->getLocale() == 'ar' ? 'معرض الصور' : 'Photo Gallery' }}
            </h2>
            
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="galleryGrid">
                <!-- Service Gallery Images -->
                @if($service->gallery_images && is_array($service->gallery_images))
                    @foreach ($service->gallery_images as $index => $image)
                        <div class="gallery-item group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                            <div class="aspect-w-16 aspect-h-12 md:aspect-w-4 md:aspect-h-3">
                                <img src="{{ asset('storage/' . $image) }}" 
                                     alt="{{ app()->getLocale() == 'ar' ? $service->title_ar . ' - صورة ' . ($index + 1) : $service->title_en . ' - Image ' . ($index + 1) }}" 
                                     class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110"
                                     loading="lazy">
                            </div>
                            
                            <!-- Image Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                                    <span class="text-white text-sm font-medium">
                                        {{ app()->getLocale() == 'ar' ? 'صورة ' . ($index + 1) : 'Image ' . ($index + 1) }}
                                    </span>
                                    <button onclick="openImageModal('{{ asset('storage/' . $image) }}', '{{ app()->getLocale() == 'ar' ? $service->title_ar . ' - صورة ' . ($index + 1) : $service->title_en . ' - Image ' . ($index + 1) }}')" 
                                            class="bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-all duration-300">
                                        <i class="fas fa-expand text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback Sample Images -->
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="gallery-item group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-105">
                            <div class="aspect-w-16 aspect-h-12 md:aspect-w-4 md:aspect-h-3">
                                <img src="https://picsum.photos/600/450?random={{ $i }}" 
                                     alt="{{ app()->getLocale() == 'ar' ? 'صورة ' . $i : 'Image ' . $i }}" 
                                     class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110"
                                     loading="lazy">
                            </div>
                            
                            <!-- Image Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                                    <span class="text-white text-sm font-medium">
                                        {{ app()->getLocale() == 'ar' ? 'صورة ' . $i : 'Image ' . $i }}
                                    </span>
                                    <button onclick="openImageModal('https://picsum.photos/1200/900?random={{ $i }}', '{{ app()->getLocale() == 'ar' ? 'صورة ' . $i : 'Image ' . $i }}')" 
                                            class="bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-all duration-300">
                                        <i class="fas fa-expand text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </div>
    
    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black/90 z-50 hidden flex items-center justify-center p-4">
        <div class="relative max-w-6xl max-h-[90vh] w-full">
            <button onclick="closeImageModal()" class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm text-white p-3 rounded-full hover:bg-white/30 transition-all duration-300 z-10">
                <i class="fas fa-times text-xl"></i>
            </button>
            <img id="modalImage" src="" alt="" class="w-full h-full object-contain rounded-lg">
        </div>
    </div>
@else
        <!-- Service Not Found -->
        <div class="py-20 bg-white">
            <div class="container mx-auto px-4 text-center">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                    <i class="fas fa-exclamation-triangle text-gray-400 text-4xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">
                    {{ app()->getLocale() == 'ar' ? 'الخدمة غير موجودة' : 'Service Not Found' }}
                </h3>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    {{ app()->getLocale() == 'ar' ? 'عذراً، الخدمة التي تبحث عنها غير موجودة. يرجى التحقق من الرابط أو العودة إلى صفحة الخدمات.' : 'Sorry, the service you are looking for does not exist. Please check the URL or return to the services page.' }}
                </p>
                <div class="mt-8">
                    <a href="{{ route('services') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-arrow-left mr-2"></i>
                        {{ app()->getLocale() == 'ar' ? 'العودة للخدمات' : 'Back to Services' }}
                    </a>
                </div>
            </div>
        </div>
@endif

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-gray-900 to-gray-800">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto" data-aos="zoom-in">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                {{ app()->getLocale() == 'ar' ? 'هل أنت مستعد لفعالية استثنائية؟' : 'Ready for your next exceptional event?' }}
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                {{ app()->getLocale() == 'ar' ? 'تواصل معنا اليوم لمناقشة تفاصيل فعالييتك وتحويلها إلى واقع' : 'Contact us today to discuss your event details and turn them into reality' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-envelope mr-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'تواصل معنا' : 'Contact Us' }}
                </a>
                <a href="tel:+966500000000" class="px-8 py-4 bg-green-600 text-white font-bold rounded-lg hover:bg-green-700 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-phone mr-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'اتصل بنا' : 'Call Us' }}
                </a>
            </div>
        </div>
    </div>
</section>  

<!-- Custom Styles -->
<style>
@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px) translateX(0px) scale(1);
    }
    25% {
        transform: translateY(-20px) translateX(10px) scale(1.05);
    }
    50% {
        transform: translateY(10px) translateX(-10px) scale(0.95);
    }
    75% {
        transform: translateY(-10px) translateX(20px) scale(1.02);
    }
}

.floating-shape {
    animation: float linear infinite;
    transition: transform 0.3s ease-out;
    cursor: move;
}

.floating-shape:hover {
    transform: scale(1.1);
    filter: brightness(1.2);
}

.gallery-item {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.hero-controls {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.control-btn {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white;
    padding: 10px 15px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 16px;
}

.control-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.1);
}

.image-slider-container {
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
}

.image-slider-container::-webkit-scrollbar {
    height: 8px;
}

.image-slider-container::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.1);
}

.image-slider-container::-webkit-scrollbar-thumb {
    background: rgba(0, 0, 0, 0.3);
    border-radius: 4px;
}
</style>

<!-- JavaScript -->
<script>
// Gallery Functions
let currentModalImage = null;

// Modal Functions
function openImageModal(imageSrc, imageAlt) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    
    modalImage.src = imageSrc;
    modalImage.alt = imageAlt;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
    
    currentModalImage = imageSrc;
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
    currentModalImage = null;
}

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && currentModalImage) {
        closeImageModal();
    }
});

// Close modal on background click
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Interactive Background Movement (keep existing functionality)
document.addEventListener('DOMContentLoaded', function() {
    const heroSection = document.getElementById('heroSection');
    const floatingShapes = document.querySelectorAll('.floating-shape');
    let isDragging = false;
    let currentShape = null;
    let startX, startY, initialX, initialY;

    // Add control buttons
    const controls = document.createElement('div');
    controls.className = 'hero-controls';
    controls.innerHTML = `
        <button class="control-btn" onclick="moveAllShapes('left')" title="Move Left">
            <i class="fas fa-arrow-left"></i>
        </button>
        <button class="control-btn" onclick="moveAllShapes('up')" title="Move Up">
            <i class="fas fa-arrow-up"></i>
        </button>
        <button class="control-btn" onclick="moveAllShapes('down')" title="Move Down">
            <i class="fas fa-arrow-down"></i>
        </button>
        <button class="control-btn" onclick="moveAllShapes('right')" title="Move Right">
            <i class="fas fa-arrow-right"></i>
        </button>
        <button class="control-btn" onclick="resetShapes()" title="Reset">
            <i class="fas fa-undo"></i>
        </button>
    `;
    document.body.appendChild(controls);

    // Mouse/Touch interaction for individual shapes
    floatingShapes.forEach(shape => {
        shape.addEventListener('mousedown', startDrag);
        shape.addEventListener('touchstart', startDrag);
        shape.addEventListener('mousemove', drag);
        shape.addEventListener('touchmove', drag);
        shape.addEventListener('mouseup', endDrag);
        shape.addEventListener('touchend', endDrag);
        shape.addEventListener('mouseleave', endDrag);
    });

    function startDrag(e) {
        isDragging = true;
        currentShape = e.target;
        currentShape.style.animationPlayState = 'paused';
        
        const touch = e.touches ? e.touches[0] : e;
        startX = touch.clientX;
        startY = touch.clientY;
        
        const rect = currentShape.getBoundingClientRect();
        const parentRect = currentShape.parentElement.getBoundingClientRect();
        initialX = rect.left - parentRect.left;
        initialY = rect.top - parentRect.top;
        
        e.preventDefault();
    }

    function drag(e) {
        if (!isDragging || !currentShape) return;
        
        const touch = e.touches ? e.touches[0] : e;
        const deltaX = touch.clientX - startX;
        const deltaY = touch.clientY - startY;
        
        currentShape.style.transform = `translate(${deltaX}px, ${deltaY}px)`;
        e.preventDefault();
    }

    function endDrag() {
        if (currentShape) {
            currentShape.style.animationPlayState = 'running';
        }
        isDragging = false;
        currentShape = null;
    }

    // Keyboard controls
    document.addEventListener('keydown', function(e) {
        switch(e.key) {
            case 'ArrowLeft':
                moveAllShapes('left');
                break;
            case 'ArrowRight':
                moveAllShapes('right');
                break;
            case 'ArrowUp':
                moveAllShapes('up');
                break;
            case 'ArrowDown':
                moveAllShapes('down');
                break;
            case 'r':
            case 'R':
                resetShapes();
                break;
        }
    });
});

// Move all shapes in a direction
function moveAllShapes(direction) {
    const shapes = document.querySelectorAll('.floating-shape');
    const distance = 30;
    
    shapes.forEach(shape => {
        const currentTransform = window.getComputedStyle(shape).transform;
        let matrix = new DOMMatrix(currentTransform);
        
        switch(direction) {
            case 'left':
                matrix.m41 -= distance;
                break;
            case 'right':
                matrix.m41 += distance;
                break;
            case 'up':
                matrix.m42 -= distance;
                break;
            case 'down':
                matrix.m42 += distance;
                break;
        }
        
        shape.style.transform = matrix.toString();
    });
}

// Reset shapes to original positions
function resetShapes() {
    const shapes = document.querySelectorAll('.floating-shape');
    shapes.forEach(shape => {
        shape.style.transform = '';
        shape.style.transition = 'transform 0.5s ease-out';
        setTimeout(() => {
            shape.style.transition = 'transform 0.3s ease-out';
        }, 500);
    });
}
</script>
</script>

@endsection
