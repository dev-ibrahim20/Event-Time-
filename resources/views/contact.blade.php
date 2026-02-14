@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'اتصل بنا - وقت الحدث' : 'Contact Us - Event Time')
@section('description', app()->getLocale() == 'ar' ? 'تواصل معنا للحصول على خدمات تجهيز المؤتمرات والمعارض والخيام الأوروبية بأعلى جودة' : 'Contact us to get conference, exhibition, and European tent setup services with the highest quality')

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "اتصل بنا - وقت الحدث",
    "url": "{{ url('/contact') }}",
    "mainEntity": {
        "@type": "Organization",
        "name": "وقت الحدث",
        "url": "{{ url('/') }}",
        "telephone": "+966500000000",
        "email": "info@eventtime.sa",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "SA",
            "addressLocality": "الرياض",
            "addressRegion": "الرياض",
            "streetAddress": "حي النخيل، الرياض"
        },
        "openingHours": "Mo-Su 00:00-23:59",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+966500000000",
            "contactType": "customer service",
            "availableLanguage": ["Arabic", "English"]
        }
    }
}
</script>
@endsection

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-red-600 to-red-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'اتصل بنا' : 'Contact Us' }}
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-4xl mx-auto leading-relaxed">
                {{ app()->getLocale() == 'ar' ? 'نحن هنا لمساعدتك في تنظيم فعاليتك المثالية. تواصل معنا الآن واحصل على استشارة مجانية' : 'We are here to help you organize your perfect event. Contact us now and get a free consultation' }}
            </p>
        </div>
    </div>
</section>

<!-- Contact Info Cards -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Phone Card -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-phone text-red-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'الهاتف' : 'Phone' }}</h3>
                <p class="text-gray-600 mb-4">{{ '+966 50 000 0000' }}</p>
                <p class="text-gray-600 mb-4">{{ '+966 11 000 0000' }}</p>
                <a href="tel:+966500000000" class="inline-flex items-center text-red-600 font-bold hover:text-red-700 transition-colors">
                    {{ app()->getLocale() == 'ar' ? 'اتصل الآن' : 'Call Now' }}
                    <i class="fas fa-arrow-left mr-2"></i>
                </a>
            </div>
            
            <!-- Email Card -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-envelope text-red-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email' }}</h3>
                <p class="text-gray-600 mb-4">info@eventtime.sa</p>
                <p class="text-gray-600 mb-4">support@eventtime.sa</p>
                <a href="mailto:info@eventtime.sa" class="inline-flex items-center text-red-600 font-bold hover:text-red-700 transition-colors">
                    {{ app()->getLocale() == 'ar' ? 'أرسل رسالة' : 'Send Message' }}
                    <i class="fas fa-arrow-left mr-2"></i>
                </a>
            </div>
            
            <!-- Location Card -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-map-marker-alt text-red-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'الموقع' : 'Location' }}</h3>
                <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'المملكة العربية السعودية' : 'Saudi Arabia' }}</p>
                <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'الرياض، حي النخيل' : 'Riyadh, Al-Nakheel District' }}</p>
                <button onclick="openMap()" class="inline-flex items-center text-red-600 font-bold hover:text-red-700 transition-colors">
                    {{ app()->getLocale() == 'ar' ? 'عرض الخريطة' : 'Show Map' }}
                    <i class="fas fa-map mr-2"></i>
                </button>
            </div>
            
            <!-- WhatsApp Card -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="400">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-600 transition-colors duration-300">
                    <i class="fab fa-whatsapp text-green-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'WhatsApp' : 'WhatsApp' }}</h3>
                <p class="text-gray-600 mb-4">{{ '+966 50 000 0000' }}</p>
                <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'متاح 24/7' : 'Available 24/7' }}</p>
                <a href="https://wa.me/966500000000" target="_blank" class="inline-flex items-center text-green-600 font-bold hover:text-green-700 transition-colors">
                    {{ app()->getLocale() == 'ar' ? 'ابدأ المحادثة' : 'Start Chat' }}
                    <i class="fab fa-whatsapp mr-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Map and Form Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Google Map -->
            <div data-aos="fade-right">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ app()->getLocale() == 'ar' ? 'موقعنا على الخريطة' : 'Our Location on Map' }}</h2>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div id="map" class="w-full h-96 relative">
                        <!-- Google Map Placeholder -->
                        <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt text-6xl text-gray-400 mb-4"></i>
                                <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'خريطة جوجل التفاعلية' : 'Interactive Google Map' }}</p>
                                <button onclick="loadMap()" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                    {{ app()->getLocale() == 'ar' ? 'تحميل الخريطة' : 'Load Map' }}
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Map Info -->
                    <div class="p-6 bg-white">
                        <div class="flex items-start space-x-3 space-x-reverse">
                            <i class="fas fa-info-circle text-red-600 mt-1"></i>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'معلومات الوصول' : 'Access Information' }}</h4>
                                <p class="text-gray-600 text-sm">{{ app()->getLocale() == 'ar' ? 'مقرنا الرئيسي في حي النخيل بالرياض، قرب تقاطع طريق الملك فهد مع طريق الأمير محمد بن سلمان' : 'Our main office is in Al-Nakheel District, Riyadh, near King Fahd Road intersection with Prince Mohammed bin Salman Road' }}</p>
                                <p class="text-gray-600 text-sm mt-2">{{ app()->getLocale() == 'ar' ? 'متوفر مواقف خاصة للزوار ووصول سهل من جميع أنحاء المدينة' : 'Special parking available for visitors with easy access from all parts of the city' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div data-aos="fade-left">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ app()->getLocale() == 'ar' ? 'أرسل لنا رسالة' : 'Send Us a Message' }}</h2>
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <form id="contactForm" onsubmit="handleContactForm('contactForm'); return false;">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-900 font-bold mb-2">
                                    {{ app()->getLocale() == 'ar' ? 'الاسم الكامل' : 'Full Name' }}
                                    <span class="text-red-600">*</span>
                                </label>
                                <input type="text" name="name" required
                                       class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                       placeholder="{{ app()->getLocale() == 'ar' ? 'أدخل اسمك الكامل' : 'Enter your full name' }}">
                            </div>
                            <div>
                                <label class="block text-gray-900 font-bold mb-2">
                                    {{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email Address' }}
                                    <span class="text-red-600">*</span>
                                </label>
                                <input type="email" name="email" required
                                       class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                       placeholder="{{ app()->getLocale() == 'ar' ? 'example@email.com' : 'example@email.com' }}">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-900 font-bold mb-2">
                                    {{ app()->getLocale() == 'ar' ? 'رقم الجوال' : 'Phone Number' }}
                                    <span class="text-red-600">*</span>
                                </label>
                                <input type="tel" name="phone" required
                                       class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                       placeholder="{{ app()->getLocale() == 'ar' ? '+966 5x xxx xxxx' : '+966 5x xxx xxxx' }}">
                            </div>
                            <div>
                                <label class="block text-gray-900 font-bold mb-2">
                                    {{ app()->getLocale() == 'ar' ? 'الموضوع' : 'Subject' }}
                                    <span class="text-red-600">*</span>
                                </label>
                                <select name="subject" required
                                        class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none">
                                    <option value="">{{ app()->getLocale() == 'ar' ? 'اختر الموضوع' : 'Select Subject' }}</option>
                                    <option value="quote">{{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}</option>
                                    <option value="consultation">{{ app()->getLocale() == 'ar' ? 'استشارة مجانية' : 'Free Consultation' }}</option>
                                    <option value="complaint">{{ app()->getLocale() == 'ar' ? 'شكوى' : 'Complaint' }}</option>
                                    <option value="suggestion">{{ app()->getLocale() == 'ar' ? 'اقتراح' : 'Suggestion' }}</option>
                                    <option value="partnership">{{ app()->getLocale() == 'ar' ? 'شراكة' : 'Partnership' }}</option>
                                    <option value="other">{{ app()->getLocale() == 'ar' ? 'أخرى' : 'Other' }}</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-900 font-bold mb-2">
                                {{ app()->getLocale() == 'ar' ? 'الرسالة' : 'Message' }}
                                <span class="text-red-600">*</span>
                            </label>
                            <textarea name="message" rows="5" required
                                      class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                      placeholder="{{ app()->getLocale() == 'ar' ? 'اكتب رسالتك هنا...' : 'Write your message here...' }}"></textarea>
                        </div>
                        
                        <div class="mb-6">
                            <label class="flex items-start cursor-pointer">
                                <input type="checkbox" name="urgent" class="mt-1 ml-3">
                                <span class="text-gray-700">
                                    {{ app()->getLocale() == 'ar' ? 'رسالة عاجلة - أريد رداً خلال ساعة' : 'Urgent message - I want a response within an hour' }}
                                </span>
                            </label>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit" 
                                    class="bg-gradient-to-r from-red-600 to-red-800 text-white px-8 py-3 rounded-lg font-bold hover:from-red-700 hover:to-red-900 transition-all duration-300 transform hover:scale-105 shadow-xl">
                                <i class="fas fa-paper-plane ml-2"></i>
                                {{ app()->getLocale() == 'ar' ? 'إرسال الرسالة' : 'Send Message' }}
                            </button>
                            <button type="reset" 
                                    class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-bold hover:bg-gray-300 transition-colors">
                                <i class="fas fa-redo ml-2"></i>
                                {{ app()->getLocale() == 'ar' ? 'إعادة تعيين' : 'Reset Form' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Working Hours Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'ساعات العمل' : 'Working Hours' }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ app()->getLocale() == 'ar' ? 'نحن هنا لخدمتك في جميع الأوقات' : 'We are here to serve you at all times' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Regular Hours -->
            <div class="bg-gray-50 rounded-lg p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-4">
                    <i class="fas fa-clock text-red-600 text-2xl ml-3"></i>
                    <h3 class="text-xl font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'ساعات العمل الرسمية' : 'Regular Business Hours' }}</h3>
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'الأحد - الخميس' : 'Sunday - Thursday' }}</span>
                        <span class="font-bold text-gray-900">8:00 AM - 6:00 PM</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'الجمعة' : 'Friday' }}</span>
                        <span class="font-bold text-red-600">{{ app()->getLocale() == 'ar' ? 'مغلق' : 'Closed' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'السبت' : 'Saturday' }}</span>
                        <span class="font-bold text-gray-900">9:00 AM - 2:00 PM</span>
                    </div>
                </div>
            </div>
            
            <!-- Emergency Support -->
            <div class="bg-red-50 rounded-lg p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-4">
                    <i class="fas fa-exclamation-triangle text-red-600 text-2xl ml-3"></i>
                    <h3 class="text-xl font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'دعم الطوارئ' : 'Emergency Support' }}</h3>
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'متاح على مدار الساعة' : 'Available 24/7' }}</span>
                        <span class="font-bold text-red-600">24/7</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'للطوارئ فقط' : 'For emergencies only' }}</span>
                        <span class="font-bold text-gray-900">{{ '+966 50 000 0000' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'WhatsApp طوارئ' : 'WhatsApp Emergency' }}</span>
                        <span class="font-bold text-green-600">{{ '+966 50 000 0000' }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Response Times -->
            <div class="bg-green-50 rounded-lg p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center mb-4">
                    <i class="fas fa-bolt text-green-600 text-2xl ml-3"></i>
                    <h3 class="text-xl font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'وقت الاستجابة' : 'Response Times' }}</h3>
                </div>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'البريد الإلكتروني' : 'Email' }}</span>
                        <span class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? '2-4 ساعات' : '2-4 hours' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'الهاتف' : 'Phone' }}</span>
                        <span class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'فوري' : 'Immediate' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'WhatsApp' : 'WhatsApp' }}</span>
                        <span class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? '5-10 دقائق' : '5-10 minutes' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Media Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'تابعنا على وسائل التواصل الاجتماعي' : 'Follow Us on Social Media' }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ app()->getLocale() == 'ar' ? 'كن على اطلاع بآخر أخبارنا وعروضنا' : 'Stay updated with our latest news and offers' }}
            </p>
        </div>
        
        <div class="flex justify-center space-x-6 space-x-reverse" data-aos="fade-up" data-aos-delay="100">
            <a href="#" class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-colors transform hover:scale-110">
                <i class="fab fa-facebook-f text-xl"></i>
            </a>
            <a href="#" class="w-16 h-16 bg-sky-500 rounded-full flex items-center justify-center text-white hover:bg-sky-600 transition-colors transform hover:scale-110">
                <i class="fab fa-twitter text-xl"></i>
            </a>
            <a href="#" class="w-16 h-16 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center text-white hover:from-purple-700 hover:to-pink-700 transition-colors transform hover:scale-110">
                <i class="fab fa-instagram text-xl"></i>
            </a>
            <a href="#" class="w-16 h-16 bg-blue-700 rounded-full flex items-center justify-center text-white hover:bg-blue-800 transition-colors transform hover:scale-110">
                <i class="fab fa-linkedin-in text-xl"></i>
            </a>
            <a href="#" class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700 transition-colors transform hover:scale-110">
                <i class="fab fa-youtube text-xl"></i>
            </a>
            <a href="#" class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center text-white hover:bg-green-600 transition-colors transform hover:scale-110">
                <i class="fab fa-whatsapp text-xl"></i>
            </a>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'الأسئلة الشائعة' : 'Frequently Asked Questions' }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ app()->getLocale() == 'ar' ? 'إجابات على الأسئلة الأكثر شيوعاً' : 'Answers to the most common questions' }}
            </p>
        </div>
        
        <div class="max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border rounded-lg" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full px-6 py-4 text-right flex justify-between items-center hover:bg-gray-50 transition-colors">
                        <span class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'كم يستغرق الحصول على عرض سعر؟' : 'How long does it take to get a quote?' }}</span>
                        <i class="fas fa-chevron-down text-gray-600 transition-transform" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-transition class="px-6 py-4 border-t bg-gray-50">
                        <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نقدم عروض الأسعار خلال 24 ساعة من استلام طلبك. في حالات الطوارئ، يمكننا تقديم عرض سعر خلال ساعتين.' : 'We provide quotes within 24 hours of your request. In emergency cases, we can provide a quote within 2 hours.' }}</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="border rounded-lg" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full px-6 py-4 text-right flex justify-between items-center hover:bg-gray-50 transition-colors">
                        <span class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'هل تقدمون خدمات في جميع أنحاء المملكة؟' : 'Do you provide services in all regions of the Kingdom?' }}</span>
                        <i class="fas fa-chevron-down text-gray-600 transition-transform" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-transition class="px-6 py-4 border-t bg-gray-50">
                        <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نعم، نقدم خدماتنا في جميع أنحاء المملكة العربية السعودية. لدينا فرق في الرياض، جدة، الدمام، وغيرها من المدن الرئيسية.' : 'Yes, we provide our services in all regions of the Kingdom of Saudi Arabia. We have teams in Riyadh, Jeddah, Dammam, and other major cities.' }}</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="border rounded-lg" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full px-6 py-4 text-right flex justify-between items-center hover:bg-gray-50 transition-colors">
                        <span class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'هل تقدمون ضمان على خدماتكم؟' : 'Do you offer guarantees on your services?' }}</span>
                        <i class="fas fa-chevron-down text-gray-600 transition-transform" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-transition class="px-6 py-4 border-t bg-gray-50">
                        <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نعم، نقدم ضمان كامل على جميع خدماتنا ومنتجاتنا. يشمل ذلك ضمان الجودة وضمان الأداء وضمان رضا العملاء.' : 'Yes, we offer a full guarantee on all our services and products. This includes quality guarantee, performance guarantee, and customer satisfaction guarantee.' }}</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="border rounded-lg" x-data="{ open: false }">
                    <button @click="open = !open" class="w-full px-6 py-4 text-right flex justify-between items-center hover:bg-gray-50 transition-colors">
                        <span class="font-bold text-gray-900">{{ app()->getLocale() == 'ar' ? 'كيف يمكنني حجز موعد استشارة؟' : 'How can I book a consultation appointment?' }}</span>
                        <i class="fas fa-chevron-down text-gray-600 transition-transform" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <div x-show="open" x-transition class="px-6 py-4 border-t bg-gray-50">
                        <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'يمكنك حجز موعد استشارة عبر الهاتف أو البريد الإلكتروني أو WhatsApp. كما يمكنك ملء نموذج الاستشارة على موقعنا وسنتواصل معك خلال 24 ساعة.' : 'You can book a consultation appointment via phone, email, or WhatsApp. You can also fill out the consultation form on our website and we will contact you within 24 hours.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Contact Form Handler
window.handleContactForm = async function(formId) {
    if (!validateForm(formId)) {
        showNotification('{{ app()->getLocale() == 'ar' ? 'يرجى ملء جميع الحقول المطلوبة' : 'Please fill in all required fields' }}', 'error');
        return;
    }

    const form = document.getElementById(formId);
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    // Show loading state
    submitBtn.innerHTML = '<span class="loading-spinner inline-block w-4 h-4 mr-2"></span> {{ app()->getLocale() == 'ar' ? 'جاري الإرسال...' : 'Sending...' }}';
    submitBtn.disabled = true;

    try {
        const response = await fetch('/contact', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        const data = await response.json();

        if (data.success) {
            showNotification('{{ app()->getLocale() == 'ar' ? 'تم إرسال رسالتك بنجاح! سنتواصل معك قريباً' : 'Your message has been sent successfully! We will contact you soon.' }}', 'success');
            form.reset();
        } else {
            showNotification(data.message || '{{ app()->getLocale() == 'ar' ? 'حدث خطأ ما. يرجى المحاولة مرة أخرى' : 'An error occurred. Please try again.' }}', 'error');
        }
    } catch (error) {
        showNotification('{{ app()->getLocale() == 'ar' ? 'حدث خطأ في الاتصال. يرجى المحاولة مرة أخرى' : 'Connection error occurred. Please try again.' }}', 'error');
    } finally {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }
};

// Map Functions
window.openMap = function() {
    window.open('https://maps.google.com/?q=24.7136,46.6753', '_blank');
};

window.loadMap = function() {
    const mapDiv = document.getElementById('map');
    mapDiv.innerHTML = `
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3632.123456789!2d46.6753!3d24.7136!2m3!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1sar!2ssa!4v1234567890"
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    `;
};
</script>

@include('partials.clients-simple')

@endsection
