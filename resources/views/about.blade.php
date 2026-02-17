@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'من نحن - وقت الحدث' : 'About Us - Event Time')
@section('description', app()->getLocale() == 'ar' ? 'تعرف على شركة وقت الحدث الرائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية' : 'Learn about Event Time, the leading company in conference, exhibition, and European tent setup')

@section('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AboutPage",
    "name": "من نحن - وقت الحدث",
    "url": "{{ url('/about') }}",
    "description": "تعرف على شركة وقت الحدث الرائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية",
    "mainEntity": {
        "@type": "Organization",
        "name": "وقت الحدث",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('assets/images/logo.png') }}",
        "description": "شركة رائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية بأعلى معايير الجودة والاحترافية",
        "foundingDate": "2014",
        "numberOfEmployees": "50+",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "SA",
            "addressLocality": "الرياض",
            "streetAddress": "حي النخيل، الرياض"
        },
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
                {{ app()->getLocale() == 'ar' ? 'من نحن' : 'About Us' }}
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-4xl mx-auto leading-relaxed">
                {{ app()->getLocale() == 'ar' ? 'شركة وقت الحدث - الشريك الموثوق في تنظيم الفعاليات الكبرى' : 'Event Time Company - The trusted partner in organizing major events' }}
            </p>
        </div>
    </div>
</section>

<!-- Company Story Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    {{ app()->getLocale() == 'ar' ? 'قصتنا ورؤيتنا' : 'Our Story & Vision' }}
                </h2>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>
                        {{ app()->getLocale() == 'ar' ? 'تأسست شركة وقت الحدث في عام 2014، ومنذ ذلك ونحن نسعى جاهدين لتقديم خدمات متميزة في مجال تنظيم الفعاليات الكبرى. بدأنا كفريق صغير يضم شغفاء متخصصين، واليوم أصبحنا واحدة من الشركات الرائدة في المملكة العربية السعودية في مجال تجهيز المؤتمرات والمعارض والخيام الأوروبية.' : 'Event Time was established in 2014, and since then we have been striving to provide distinguished services in the field of organizing major events. We started as a small team of specialized professionals, and today we have become one of the leading companies in the Kingdom of Saudi Arabia in the field of conference, exhibition, and European tent setup.' }}
                    </p>
                    <p>
                        {{ app()->getLocale() == 'ar' ? 'نؤمن بأن كل فعالية هي فرصة فريدة لإحداث تأثير إيجابي، ولهذا السبب نعمل بكل شغف واهتمام على تفاصيل كل مشروع نعمل عليه. من التخطيط الأولي إلى التنفيذ النهائي، نضمن لكم تجربة لا تُنسى.' : 'We believe that every event is a unique opportunity to make a positive impact, and for this reason we work with passion and attention to the details of every project we work on. From initial planning to final implementation, we guarantee you an unforgettable experience.' }}
                    </p>
                    <p>
                        {{ app()->getLocale() == 'ar' ? 'خبرتنا تمتد لأكثر من 10 سنوات في تنظيم أكثر من 500 فعالية ناجحة، من المؤتمرات الدولية الكبرى إلى المعارض التجارية والحفلات الخاصة. عملنا مع أكبر الشركات والمؤسسات في المملكة وخارجها، مما أكسبنا سمعة قوية في السوق.' : 'Our experience extends for more than 10 years in organizing more than 500 successful events, from major international conferences to commercial exhibitions and private parties. We have worked with the largest companies and institutions in the Kingdom and abroad, which has given us a strong reputation in the market.' }}
                    </p>
                </div>
                
                <!-- Company Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-600 mb-2">10+</div>
                        <p class="text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'سنوات خبرة' : 'Years of Experience' }}</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-600 mb-2">500+</div>
                        <p class="text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'مشروع منجز' : 'Completed Projects' }}</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-600 mb-2">50+</div>
                        <p class="text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'موظف متخصص' : 'Specialized Staff' }}</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-600 mb-2">98%</div>
                        <p class="text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'رضا العملاء' : 'Client Satisfaction' }}</p>
                    </div>
                </div>
            </div>
            
            <div data-aos="fade-left">
                <img src="{{ asset('assets/images/about/company-story.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'قصة الشركة' : 'Company Story' }}" class="rounded-lg shadow-xl w-full h-96 object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Mission -->
            <div data-aos="fade-up">
                <div class="bg-white rounded-lg shadow-lg p-8 h-full">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bullseye text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ app()->getLocale() == 'ar' ? 'رسالتنا' : 'Our Mission' }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ app()->getLocale() == 'ar' ? 'نحن نسعى لتحويل كل فعالية إلى تجربة استثنائية تتجاوز التوقعات. من خلال الجودة العالية والابتكار المستمر والاهتمام الدقيق بالتفاصيل، نهدف لأن نكون الشريك المفضل لعملائنا في تحقيق أهدافهم وإحداث تأثير إيجابي دائم في مجتمعاتهم.' : 'We strive to transform every event into an exceptional experience that exceeds expectations. Through high quality, continuous innovation, and meticulous attention to detail, we aim to be the preferred partner for our clients in achieving their goals and making a lasting positive impact in their communities.' }}
                    </p>
                </div>
            </div>
            
            <!-- Vision -->
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded-lg shadow-lg p-8 h-full">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-eye text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ app()->getLocale() == 'ar' ? 'رؤيتنا' : 'Our Vision' }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ app()->getLocale() == 'ar' ? 'أن نكون الشركة الرائدة في المنطقة في مجال تنظيم الفعاليات، معروفين بالجودة الفائقة والاحترافية والابتكار. نسعى لتوسيع خدماتنا لتشمل جميع أنحاء المملكة والدول المجاورة، مع الحفاظ على معاييرنا العالية وسمعتنا المتميزة.' : 'To be the leading company in the region in the field of event management, known for excellence, professionalism, and innovation. We seek to expand our services to cover all regions of the Kingdom and neighboring countries, while maintaining our high standards and distinguished reputation.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'قيمنا' : 'Our Values' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'القيم التي توجه كل ما نفعله وكل قرار نتخذه' : 'The values that guide everything we do and every decision we make' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Value 1 -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-award text-red-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'الجودة الفائقة' : 'Excellence' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'لا نقبل بأقل من الأفضل في كل ما نقدمه' : 'We accept nothing less than the best in everything we offer' }}</p>
            </div>
            
            <!-- Value 2 -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-600 transition-colors duration-300">
                    <i class="fas fa-lightbulb text-blue-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'الابتكار' : 'Innovation' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نبحث دائماً عن أفكار جديدة ومبتكرة' : 'We are always looking for new and creative ideas' }}</p>
            </div>
            
            <!-- Value 3 -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-600 transition-colors duration-300">
                    <i class="fas fa-handshake text-green-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'الثقة' : 'Trust' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نحن شركاء موثوقون في نجاح عملائنا' : 'We are trusted partners in our clients\' success' }}</p>
            </div>
            
            <!-- Value 4 -->
            <div class="text-center group" data-aos="fade-up" data-aos-delay="400">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-600 transition-colors duration-300">
                    <i class="fas fa-users text-purple-600 text-2xl group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'العمل الجماعي' : 'Teamwork' }}</h3>
                <p class="text-gray-600">{{ app()->getLocale() == 'ar' ? 'نجاحنا يأتي من عملنا كفريق واحد' : 'Our success comes from working as one team' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
{{-- <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'فريق القيادة' : 'Leadership Team' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'القيادة التنفيذية التي تقود شركة وقت الحدث نحو التميز' : 'The executive leadership that guides Event Time towards excellence' }}
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden group" data-aos="fade-up" data-aos-delay="100">
                <div class="relative">
                    <img src="{{ asset('assets/images/team/ceo.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'الرئيس التنفيذي' : 'CEO' }}" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">{{ app()->getLocale() == 'ar' ? 'محمد الأحمدي' : 'Mohammed Al-Ahmadi' }}</h3>
                    <p class="text-red-600 font-medium mb-3">{{ app()->getLocale() == 'ar' ? 'الرئيس التنفيذي' : 'Chief Executive Officer' }}</p>
                    <p class="text-gray-600 text-sm">{{ app()->getLocale() == 'ar' ? 'خبير في إدارة الفعاليات مع أكثر من 15 عاماً من الخبرة في المنطقة' : 'Expert in event management with over 15 years of experience in the region' }}</p>
                    <div class="flex space-x-4 space-x-reverse mt-4">
                        <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                <div class="relative">
                    <img src="{{ asset('assets/images/team/coo.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'مدير العمليات' : 'COO' }}" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">{{ app()->getLocale() == 'ar' ? 'عبدالله محمد' : 'Abdullah Mohammed' }}</h3>
                    <p class="text-red-600 font-medium mb-3">{{ app()->getLocale() == 'ar' ? 'مدير العمليات' : 'Chief Operating Officer' }}</p>
                    <p class="text-gray-600 text-sm">{{ app()->getLocale() == 'ar' ? 'متخصص في التخطيط وتنفيذ الفعاليات الكبرى مع خبرة تزيد عن 12 عاماً' : 'Specialized in planning and executing major events with over 12 years of experience' }}</p>
                    <div class="flex space-x-4 space-x-reverse mt-4">
                        <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Team Member3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden group" data-aos="fade-up" data-aos-delay="300">
                <div class="relative">
                    <img src="{{ asset('assets/images/team/creative.jpg') }}" alt="{{ app()->getLocale() == 'ar' ? 'مدير الإبداع' : 'Creative Director' }}" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-1">{{ app()->getLocale() == 'ar' ? 'سارة أحمد' : 'Sarah Ahmed' }}</h3>
                    <p class="text-red-600 font-medium mb-3">{{ app()->getLocale() == 'ar' ? 'مدير الإبداع' : 'Creative Director' }}</p>
                    <p class="text-gray-600 text-sm">{{ app()->getLocale() == 'ar' ? 'مصممة مبدعة تضيف لمسة فريدة لكل فعالية ننظمها' : 'Creative designer who adds a unique touch to every event we organize' }}</p>
                    <div class="flex space-x-4 space-x-reverse mt-4">
                        <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-red-600 to-red-800 text-white">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-3xl mx-auto" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                {{ app()->getLocale() == 'ar' ? 'انضم إلى فريق عملائنا' : 'Join Our Client Family' }}
            </h2>
            <p class="text-xl mb-8 text-red-100">
                {{ app()->getLocale() == 'ar' ? 'نبحث دائماً عن المواهب الطموحة الذين يشاركونا شغفنا في تحقيق أهدافنا' : 'We are always looking for ambitious talents who share our passion for achieving our goals' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="bg-white text-red-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fas fa-briefcase ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'توظف معنا' : 'Work With Us' }}
                </a>
                <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-bold hover:bg-white hover:text-red-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-paper-plane ml-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'طلب استشارة' : 'Request Consultation' }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Certifications Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'الشهادات والاعتمادات' : 'Certifications & Accreditations' }}
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'شهاداتنا واعتماداتنا تؤكد على جودتنا واحترافيتنا' : 'Our certifications and accreditations confirm our quality and professionalism' }}
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gray-100 rounded-lg p-6 h-32 flex items-center justify-center">
                    <i class="fas fa-certificate text-4xl text-gray-400"></i>
                </div>
                <p class="mt-4 text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'شهادة ISO 9001' : 'ISO 9001 Certificate' }}</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gray-100 rounded-lg p-6 h-32 flex items-center justify-center">
                    <i class="fas fa-award text-4xl text-gray-400"></i>
                </div>
                <p class="mt-4 text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'عضو غرفة الرياض' : 'Riyadh Chamber Member' }}</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-gray-100 rounded-lg p-6 h-32 flex items-center justify-center">
                    <i class="fas fa-shield-alt text-4xl text-gray-400"></i>
                </div>
                <p class="mt-4 text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'اعتماد وزارة السياحة' : 'Ministry of Tourism Accreditation' }}</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-gray-100 rounded-lg p-6 h-32 flex items-center justify-center">
                    <i class="fas fa-star text-4xl text-gray-400"></i>
                </div>
                <p class="mt-4 text-sm text-gray-600">{{ app()->getLocale() == 'ar' ? 'مزود معتمد' : 'Approved Vendor' }}</p>
            </div>
        </div>
    </div>
</section>

@include('partials.clients-simple')

@endsection
