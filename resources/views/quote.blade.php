@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'طلب عرض سعر - وقت الحدث' : 'Request Quote - Event Time')
@section('description', app()->getLocale() == 'ar' ? 'احصل على عرض سعر مخصص لخدمات تجهيز المؤتمرات والمعارض والخيام الأوروبية' : 'Get a specialized quote for conference, exhibition, and European tent setup services')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-red-600 to-red-800 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'طلب عرض سعر' : 'Request Quote' }}
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-4xl mx-auto leading-relaxed">
                {{ app()->getLocale() == 'ar' ? 'احصل على عرض سعر مخصص لخدمات تجهيز المؤتمرات والمعارض والخيام الأوروبية' : 'Get a specialized quote for conference, exhibition, and European tent setup services' }}
            </p>
        </div>
    </div>
</section>

<!-- Quote Form Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden" data-aos="fade-up">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-red-600 to-red-800 p-6 text-white">
                    <h2 class="text-2xl font-bold mb-4 text-center">
                        {{ app()->getLocale() == 'ar' ? 'معلومات طلب الخدمة' : 'Service Request Information' }}
                    </h2>
                </div>
                <p class="text-red-100">{{ __('يرجى ملء جميع الحقول المطلوبة للحصول على عرض سعر دقيق') }}</p>
                <!-- Form Body -->
                <form id="quoteForm" class="p-8" method="post" action="{{ route('quote-request.submit') }}" enctype="multipart/form-data" onsubmit="handleQuoteForm('quoteForm'); return false;">
                    @csrf
                    
                    <!-- Service Type Selection -->
                    <div class="mb-8">
                        <label class="block text-lg font-bold text-gray-900 mb-4">
                            <i class="fas fa-briefcase ml-2 text-red-600"></i>
                            {{ app()->getLocale() == 'ar' ? 'نوع الخدمة المطلوبة' : 'Service Type' }}
                            <span class="text-red-600">*</span>
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            @if($services->isEmpty())
                                <p class="text-gray-500">{{ __('No services available') }}</p>
                            @else
                            @foreach ($services as $service)
                                <label class="service-option cursor-pointer">
                                    <input type="radio" name="service_type" value="{{ $service->slug }}" class="hidden" required>
                                    <div class="border-2 border-gray-300 rounded-lg p-4 text-center hover:border-red-600 transition-colors">
                                        <i class="fas fa-briefcase text-3xl text-red-600 mb-2"></i>
                                        <h4 class="font-bold">{{ app()->getLocale() == 'ar' ? $service->title_ar : $service->title_en }}</h4>
                                    </div>
                                </label>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    
                    <!-- Event Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">
                                {{ app()->getLocale() == 'ar' ? 'نوع الفعالية' : 'Event Type' }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="event_type" required
                                   class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                   placeholder="{{ app()->getLocale() == 'ar' ? 'مثال: مؤتمر، حفل زفاف، معرض تجاري' : 'Event type, e.g., wedding, conference, party' }}">
                        </div>
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">
                                {{ app()->getLocale() == 'ar' ? 'عدد الحضور المتوقع' : 'Expected Attendance' }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="number" name="expected_attendees" required
                                   class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                   placeholder="{{ app()->getLocale() == 'ar' ? 'مثال: 500 شخص' : 'e.g., 500 people' }}">
                        </div>
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">
                                {{ app()->getLocale() == 'ar' ? 'تاريخ الفعالية' : 'Event Date' }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="date" name="event_date" required
                                   class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                   placeholder="{{ app()->getLocale() == 'ar' ? 'اختر التاريخ' : 'Select Date' }}">
                        </div>
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">
                                {{ app()->getLocale() == 'ar' ? 'مدة الفعالية' : 'Event Duration' }}
                                <span class="text-red-600">*</span>
                            </label>
                            <select name="event_duration" required
                                    class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none">
                                <option value="">{{ app()->getLocale() == 'ar' ? 'اختر المدة' : 'Select Duration' }}</option>
                                <option value="half_day">{{ app()->getLocale() == 'ar' ? 'نصف يوم' : 'Half Day' }}</option>
                                <option value="full_day">{{ app()->getLocale() == 'ar' ? 'يوم كامل' : 'Full Day' }}</option>
                                <option value="two_days">{{ app()->getLocale() == 'ar' ? 'يومان' : 'Two Days' }}</option>
                                <option value="three_days">{{ app()->getLocale() == 'ar' ? 'ثلاثة أيام' : 'Three Days' }}</option>
                                <option value="week">{{ app()->getLocale() == 'ar' ? 'أسبوع' : 'One Week' }}</option>
                                <option value="more">{{ app()->getLocale() == 'ar' ? 'أكثر من أسبوع' : 'More than a Week' }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">
                                {{ app()->getLocale() == 'ar' ? 'موقع الفعالية' : 'Event Location' }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="event_location" required
                                   class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                   placeholder="{{ app()->getLocale() == 'ar' ? 'المدينة، الحي، العنوان التفصيلي' : 'City, Venue, Address' }}">
                        </div>
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">
                                {{ app()->getLocale() == 'ar' ? 'المساحة المطلوبة (متر مربع)' : 'Required Space (Square Meters)' }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="number" name="required_space" required
                                   class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                   placeholder="{{ app()->getLocale() == 'ar' ? 'مثال: 500' : 'e.g., 500' }}">
                        </div>
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">
                                {{ app()->getLocale() == 'ar' ? 'نوع المساحة' : 'Space Type' }}
                                <span class="text-gray-600 text-sm">({{ app()->getLocale() == 'ar' ? 'اختياري' : 'Optional' }})</span>
                            </label>
                            <select name="space_type" required
                                    class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none">
                                <option value="">{{ app()->getLocale() == 'ar' ? 'اختر نوع المساحة' : 'Select Space Type' }}</option>
                                <option value="indoor">{{ app()->getLocale() == 'ar' ? 'داخل مبنى' : 'Indoor' }}</option>
                                <option value="outdoor">{{ app()->getLocale() == 'ar' ? 'في الهواء الطلق' : 'Outdoor' }}</option>
                                <option value="both">{{ app()->getLocale() == 'ar' ? 'داخلي وخارجي' : 'Both Indoor & Outdoor' }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-900 font-bold mb-2">
                                {{ app()->getLocale() == 'ar' ? 'الميزانية التقديرية' : 'Budget Range' }}
                                <span class="text-gray-600 text-sm">({{ app()->getLocale() == 'ar' ? 'اختياري' : 'Optional' }})</span>
                            </label>
                            <select name="budget_range" class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none">
                                <option value="">{{ app()->getLocale() == 'ar' ? 'اختر الميزانية' : 'Select Budget Range' }}</option>
                                <option value="5000-10000">{{ app()->getLocale() == 'ar' ? '5,000 - 10,000 ريال' : '5,000 - 10,000 SAR' }}</option>
                                <option value="10000-25000">{{ app()->getLocale() == 'ar' ? '10,000 - 25,000 ريال' : '10,000 - 25,000 SAR' }}</option>
                                <option value="25000-50000">{{ app()->getLocale() == 'ar' ? '25,000 - 50,000 ريال' : '25,000 - 50,000 SAR' }}</option>
                                <option value="50000-100000">{{ app()->getLocale() == 'ar' ? '50,000 - 100,000 ريال' : '50,000 - 100,000 SAR' }}</option>
                                <option value="100000+">{{ app()->getLocale() == 'ar' ? 'أكثر من 100,000 ريال' : 'More than 100,000 SAR' }}</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Special Requirements -->
                    <div class="mb-8">
                        <label class="block text-gray-900 font-bold mb-2">
                            {{ app()->getLocale() == 'ar' ? 'متطلبات خاصة' : 'Special Requirements' }}
                            <span class="text-gray-600 text-sm">({{ app()->getLocale() == 'ar' ? 'اختياري' : 'Optional' }})</span>
                        </label>
                        <textarea name="special_requirements" rows="4"
                                  class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                  placeholder="{{ app()->getLocale() == 'ar' ? 'أي متطلبات خاصة أو تفاصيل إضافية تود ذكرها...' : 'Any special requirements or additional details you would like to mention...' }}"></textarea>
                    </div>
                    
                    <!-- File Upload -->
                    <div class="mb-8">
                        <label class="block text-gray-900 font-bold mb-2">
                            <i class="fas fa-paperclip ml-2 text-red-600"></i>
                            {{ app()->getLocale() == 'ar' ? 'رفع الملفات' : 'Upload Files' }}
                            <span class="text-gray-600 text-sm">({{ app()->getLocale() == 'ar' ? 'اختياري' : 'Optional' }})</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-red-600 transition-colors">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-600 mb-2">{{ app()->getLocale() == 'ar' ? 'اسحب وأفلت الملفات هنا أو انقر للاختيار' : 'Drag and drop files here or click to select' }}</p>
                            <p class="text-sm text-gray-500">{{ app()->getLocale() == 'ar' ? 'الصيغ المسموحة: PDF, DOC, DOCX, JPG, PNG (الحد الأقصى: 10MB)' : 'Allowed formats: PDF, DOC, DOCX, JPG, PNG (Max size: 10MB)' }}</p>
                            <input type="file" name="attachments[]" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                   class="hidden" id="fileInput">
                            <button type="button" onclick="document.getElementById('fileInput').click()"
                                    class="mt-4 bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-colors">
                                {{ app()->getLocale() == 'ar' ? 'اختر ملفات' : 'Select Files' }}
                            </button>
                        </div>
                        <div id="fileList" class="mt-4 space-y-2"></div>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="border-t pt-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">
                            <i class="fas fa-user ml-2 text-red-600"></i>
                            {{ app()->getLocale() == 'ar' ? 'معلومات التواصل' : 'Contact Information' }}
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-900 font-bold mb-2">
                                    {{ app()->getLocale() == 'ar' ? 'الاسم الكامل' : 'Full Name' }}
                                    <span class="text-red-600">*</span>
                                </label>
                                <input type="text" name="full_name" required
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
                                    {{ app()->getLocale() == 'ar' ? 'الشركة/المنظمة' : 'Company/Organization' }}
                                    <span class="text-gray-600 text-sm">({{ app()->getLocale() == 'ar' ? 'اختياري' : 'Optional' }})</span>
                                </label>
                                <input type="text" name="company"
                                       class="luxury-input w-full px-4 py-3 rounded-lg focus:outline-none"
                                       placeholder="{{ app()->getLocale() == 'ar' ? 'اسم الشركة أو المنظمة' : 'Company or Organization name' }}">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Terms and Submit -->
                    <div class="border-t pt-8">
                        <div class="mb-6">
                            <label class="flex items-start cursor-pointer">
                                <input type="checkbox" name="terms" required class="mt-1 ml-3">
                                <span class="text-gray-700">
                                    {{ app()->getLocale() == 'ar' ? 'أوافق على' : 'I agree to the' }} <a href="#" class="text-red-600 hover:underline">{{ app()->getLocale() == 'ar' ? 'الشروط والأحكام' : 'Terms and Conditions' }}</a> 
                                    {{ app()->getLocale() == 'ar' ? 'و' : 'and' }} <a href="#" class="text-red-600 hover:underline">{{ app()->getLocale() == 'ar' ? 'سياسة الخصوصية' : 'Privacy Policy' }}</a>
                                </span>
                            </label>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <button type="submit" 
                                    class="bg-gradient-to-r from-red-600 to-red-800 text-white px-8 py-4 rounded-lg text-lg font-bold hover:from-red-700 hover:to-red-900 transition-all duration-300 transform hover:scale-105 shadow-xl">
                                <i class="fas fa-paper-plane ml-2"></i>
                                {{ app()->getLocale() == 'ar' ? 'إرسال الطلب' : 'Submit Request' }}
                            </button>
                            <button type="reset" 
                                    class="bg-gray-200 text-gray-700 px-8 py-4 rounded-lg text-lg font-bold hover:bg-gray-300 transition-colors">
                                <i class="fas fa-redo ml-2"></i>
                                {{ app()->getLocale() == 'ar' ? 'إعادة تعيين' : 'Reset Form' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Contact Info Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'هل تحتاج مساعدة؟' : 'Need Help?' }}
            </h2>
            <p class="text-xl text-gray-600">
                {{ app()->getLocale() == 'ar' ? 'فريق الخبراء لدينا جاهز لمساعدتك في أي وقت' : 'Our expert team is ready to help you anytime' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-phone text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'اتصل بنا مباشرة' : 'Call Us Directly' }}</h3>
                <p class="text-gray-600 mb-4">{{ '+966 50 000 0000' }}</p>
                <a href="tel:+966500000000" class="text-red-600 font-bold hover:text-red-700">
                    {{ app()->getLocale() == 'ar' ? 'اتصل الآن' : 'Call Now' }}
                </a>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-envelope text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'راسلنا عبر البريد' : 'Email Us' }}</h3>
                <p class="text-gray-600 mb-4">info@eventtime.sa</p>
                <a href="mailto:info@eventtime.sa" class="text-red-600 font-bold hover:text-red-700">
                    {{ app()->getLocale() == 'ar' ? 'أرسل رسالة' : 'Send Message' }}
                </a>
            </div>
            
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fab fa-whatsapp text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'WhatsApp' : 'WhatsApp' }}</h3>
                <p class="text-gray-600 mb-4">{{ '+966 50 000 0000' }}</p>
                <a href="https://wa.me/966500000000" target="_blank" class="text-red-600 font-bold hover:text-red-700">
                    {{ app()->getLocale() == 'ar' ? 'ابدأ المحادثة' : 'Start Chat' }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Clients Slider Section -->

<script>
// Service Type Selection
document.querySelectorAll('input[name="service_type"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.service-option div').forEach(div => {
            div.classList.remove('border-red-600', 'bg-red-50');
            div.classList.add('border-gray-300');
        });
        
        if (this.checked) {
            this.nextElementSibling.classList.remove('border-gray-300');
            this.nextElementSibling.classList.add('border-red-600', 'bg-red-50');
        }
    });
});

// File Upload Handler
document.getElementById('fileInput').addEventListener('change', function(e) {
    const fileList = document.getElementById('fileList');
    fileList.innerHTML = '';
    
    Array.from(e.target.files).forEach(file => {
        const fileItem = document.createElement('div');
        fileItem.className = 'flex items-center justify-between bg-gray-50 p-3 rounded-lg';
        fileItem.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-file text-red-600 ml-2"></i>
                <span class="text-sm text-gray-700">${file.name}</span>
                <span class="text-xs text-gray-500 mr-2">(${(file.size / 1024 / 1024).toFixed(2)} MB)</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-700">
                <i class="fas fa-times"></i>
            </button>
        `;
        fileList.appendChild(fileItem);
    });
});
</script>
@endsection
