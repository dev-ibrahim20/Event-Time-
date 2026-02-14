<!-- Advanced Products Filter Section -->
<section class="py-16 bg-gradient-to-br from-red-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'تصفية المنتجات المتقدمة' : 'Advanced Product Filters' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'ابحث عن المنتجات المثالية لفعاليتك باستخدام أدوات التصفية المتقدمة' : 'Find the perfect products for your event using our advanced filtering tools' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Filter Card 1: Tents -->
            <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-200" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-campground text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        {{ app()->getLocale() == 'ar' ? 'الخيام الأوروبية' : 'European Tents' }}
                    </h3>
                    <p class="text-gray-600">
                        {{ app()->getLocale() == 'ar' ? 'خيام فاخرة بأحجام متنوعة' : 'Luxury tents in various sizes' }}
                    </p>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'المقاسات:' : 'Sizes:' }}</span>
                        <span class="font-medium text-red-600">6x9, 8x12</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'السعر يبدأ من:' : 'Price from:' }}</span>
                        <span class="font-medium text-red-600">2500 {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}</span>
                    </div>
                    <a href="{{ route('products.index', ['category' => app()->getLocale() == 'ar' ? 'خيام أوروبية' : 'European Tents']) }}" 
                       class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white py-3 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 font-medium">
                        {{ app()->getLocale() == 'ar' ? 'عرض الخيام' : 'View Tents' }}
                    </a>
                </div>
            </div>
            
            <!-- Filter Card 2: Furniture -->
            <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-200" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-couch text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        {{ app()->getLocale() == 'ar' ? 'أثاث الفعاليات' : 'Event Furniture' }}
                    </h3>
                    <p class="text-gray-600">
                        {{ app()->getLocale() == 'ar' ? 'طاولات وكراسي عالية الجودة' : 'High-quality tables and chairs' }}
                    </p>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'الأنواع:' : 'Types:' }}</span>
                        <span class="font-medium text-blue-600">{{ app()->getLocale() == 'ar' ? 'طاولات، كراسي' : 'Tables, Chairs' }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'السعر يبدأ من:' : 'Price from:' }}</span>
                        <span class="font-medium text-blue-600">350 {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}</span>
                    </div>
                    <a href="{{ route('products.index', ['category' => app()->getLocale() == 'ar' ? 'أثاث حفلات' : 'Party Furniture']) }}" 
                       class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 font-medium">
                        {{ app()->getLocale() == 'ar' ? 'عرض الأثاث' : 'View Furniture' }}
                    </a>
                </div>
            </div>
            
            <!-- Filter Card 3: Lighting -->
            <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-200" data-aos="fade-up" data-aos-delay="300">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        {{ app()->getLocale() == 'ar' ? 'الإضاءة الاحترافية' : 'Professional Lighting' }}
                    </h3>
                    <p class="text-gray-600">
                        {{ app()->getLocale() == 'ar' ? 'أنظمة إضاءة متحركة وثابتة' : 'Moving and static lighting systems' }}
                    </p>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'المميزات:' : 'Features:' }}</span>
                        <span class="font-medium text-yellow-600">{{ app()->getLocale() == 'ar' ? 'RGB، متحرك' : 'RGB, Moving' }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'السعر يبدأ من:' : 'Price from:' }}</span>
                        <span class="font-medium text-yellow-600">1500 {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}</span>
                    </div>
                    <a href="{{ route('products.index', ['category' => app()->getLocale() == 'ar' ? 'إضاءة احترافية' : 'Professional Lighting']) }}" 
                       class="w-full bg-gradient-to-r from-yellow-500 to-orange-600 text-white py-3 rounded-xl hover:from-yellow-600 hover:to-orange-700 transition-all duration-300 font-medium">
                        {{ app()->getLocale() == 'ar' ? 'عرض الإضاءة' : 'View Lighting' }}
                    </a>
                </div>
            </div>
            
            <!-- Filter Card 4: Sound & Screens -->
            <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-200" data-aos="fade-up" data-aos-delay="400">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-volume-up text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        {{ app()->getLocale() == 'ar' ? 'الصوتيات والشاشات' : 'Sound & Screens' }}
                    </h3>
                    <p class="text-gray-600">
                        {{ app()->getLocale() == 'ar' ? 'أنظمة صوتية وشاشات LED احترافية' : 'Professional sound systems and LED screens' }}
                    </p>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'القدرة:' : 'Power:' }}</span>
                        <span class="font-medium text-purple-600">5000W</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'السعر يبدأ من:' : 'Price from:' }}</span>
                        <span class="font-medium text-purple-600">3200 {{ app()->getLocale() == 'ar' ? 'ريال' : 'SAR' }}</span>
                    </div>
                    <a href="{{ route('products.index', ['category' => app()->getLocale() == 'ar' ? 'شاشات LED' : 'LED Screens']) }}" 
                       class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white py-3 rounded-xl hover:from-purple-600 hover:to-purple-700 transition-all duration-300 font-medium">
                        {{ app()->getLocale() == 'ar' ? 'عرض الصوتيات' : 'View Sound Systems' }}
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Quick Stats -->
        {{-- <div class="mt-16 grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="text-center bg-white rounded-xl shadow-lg p-6 border border-gray-100" data-aos="fade-up" data-aos-delay="500">
                <div class="text-4xl font-bold text-red-600 mb-2">15+</div>
                <div class="text-gray-700 font-medium">{{ app()->getLocale() == 'ar' ? 'نوع الخيام' : 'Tent Types' }}</div>
            </div>
            <div class="text-center bg-white rounded-xl shadow-lg p-6 border border-gray-100" data-aos="fade-up" data-aos-delay="600">
                <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                <div class="text-gray-700 font-medium">{{ app()->getLocale() == 'ar' ? 'طقم أثاث' : 'Furniture Sets' }}</div>
            </div>
            <div class="text-center bg-white rounded-xl shadow-lg p-6 border border-gray-100" data-aos="fade-up" data-aos-delay="700">
                <div class="text-4xl font-bold text-yellow-600 mb-2">30+</div>
                <div class="text-gray-700 font-medium">{{ app()->getLocale() == 'ar' ? 'نظام إضاءة' : 'Lighting Systems' }}</div>
            </div>
            <div class="text-center bg-white rounded-xl shadow-lg p-6 border border-gray-100" data-aos="fade-up" data-aos-delay="800">
                <div class="text-4xl font-bold text-purple-600 mb-2">20+</div>
                <div class="text-gray-700 font-medium">{{ app()->getLocale() == 'ar' ? 'نظام صوتي' : 'Sound Systems' }}</div>
            </div>
        </div> --}}
    </div>
</section>
