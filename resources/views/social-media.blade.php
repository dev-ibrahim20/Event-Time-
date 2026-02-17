@extends('layouts.master')

@section('title', 'Social Media - Event Time')
@section('meta-description', 'Connect with us on social media platforms for events and services')
@section('meta-keywords', 'social media, event management, event services, social platforms, whatsapp integration, facebook page, instagram profile, twitter profile, professional social media')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'ar' ? 'تواصل معنا عبر وسائل التواصل الاجتماعي' : 'Connect With Us on Social Media' }}
            </h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                {{ app()->getLocale() == 'ar' ? 'تابعنا على جميع منصات التواصل الاجتماعي للحصول على آخر التحديثات والأخبار والعروض الخاصة بفعاليتنا. نحن هنا لمساعدتك على التواصل وبناء علاقات طويلة ومستدامة.' : 'Follow us on all social media platforms to stay updated with our latest news, events, and special offers. Connect with us today and let us help make your next event unforgettable!' }}
            </p>
        </div>

        <!-- Social Media Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <!-- WhatsApp -->
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fab fa-whatsapp text-4xl text-white mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'واتساب' : 'WhatsApp' }}</h3>
                <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'تواصل معنا مباشرة عبر واتساب للحصول على استشارة سريعة ودعم فني. متوفر لدينا فريق متخصص في إدارة الفعاليات وتنظيم الحدث.' : 'Connect with us instantly via WhatsApp for quick inquiries and event planning. Our dedicated team is ready to assist you with prompt responses and expert guidance.' }}</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/966500000000?text={{ app()->getLocale() == 'ar' ? 'أريد استفسار عن خدماتكم' : 'I would like to inquire about your services' }}" target="_blank" class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fab fa-whatsapp mr-2"></i>
                        <span>{{ app()->getLocale() == 'ar' ? 'محادثة واتساب' : 'WhatsApp Chat' }}</span>
                    </a>
                    <a href="tel:+966500000000" class="inline-flex items-center justify-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-phone mr-2"></i>
                        <span>{{ app()->getLocale() == 'ar' ? 'مكالمة هاتفية' : 'Phone Call' }}</span>
                    </a>
                </div>
                <a href="https://wa.me/966500000000" target="_blank" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-4 px-6 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    <i class="fab fa-whatsapp mr-2"></i>
                    {{ app()->getLocale() == 'ar' ? 'ابدأ المحادثة الآن' : 'Start WhatsApp Conversation' }}
                </a>
            </div>

            <!-- Instagram -->
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-gradient-to-br from-pink-500 via-purple-600 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fab fa-instagram text-4xl text-white mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'انستجرام' : 'Instagram' }}</h3>
                <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'تابعنا للحصول على أحدث أعمالنا ومعارض الفعاليات والفعاليات التي نقوم بتنظيمها. شاركنا متابعينا لتكون على اطلاع بكل جديد.' : 'Follow us on Instagram to see our latest projects, behind-the-scenes content, and event highlights.' }}</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://instagram.com/yourprofile" target="_blank" class="inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-lg hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fab fa-instagram mr-2"></i>
                        <span>{{ app()->getLocale() == 'ar' ? 'تابعنا' : 'Follow on Instagram' }}</span>
                    </a>
                    <a href="https://instagram.com/yourprofile" target="_blank" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-4 px-6 rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <i class="fab fa-instagram mr-2"></i>
                        {{ app()->getLocale() == 'ar' ? 'استكشف المزيد' : 'View Instagram Profile' }}
                </a>
                </div>
            </div>

            <!-- Facebook -->
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-600 via-indigo-600 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fab fa-facebook-f text-4xl text-white mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'فيسبوك' : 'Facebook' }}</h3>
                <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'تابع صفحتنا على فيسبوك للحصول على آخر الأخبار والعروض الخاصة. انضم إلى مجتمعنا المتنامي ومشاركنا الأحداث.' : 'Like our Facebook page to stay updated with news, events, and community updates.' }}</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://facebook.com/yourpage" target="_blank" class="inline-flex items-center justify-center bg-gradient-to-r from-indigo-600 to-blue-700 text-white px-6 py-3 rounded-lg hover:from-indigo-700 hover:to-blue-800 transition-all duration-300 transform hover:scale-105">
                        <i class="fab fa-facebook-f mr-2"></i>
                        <span>{{ app()->getLocale() == 'ar' ? 'تابعنا' : 'Like on Facebook' }}</span>
                    </a>
                    <a href="https://facebook.com/yourpage" target="_blank" class="w-full bg-gradient-to-r from-indigo-600 to-blue-700 text-white font-bold py-4 px-6 rounded-xl hover:from-indigo-700 hover:to-blue-800 transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <i class="fab fa-facebook-f mr-2"></i>
                        {{ app()->getLocale() == 'ar' ? 'استكشف المزيد' : 'View Facebook Page' }}
                </a>
                </div>
            </div>

            <!-- Twitter -->
            <div class="bg-white rounded-2xl shadow-xl p-8 text-center transform transition-all duration-300 hover:scale-105 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="400">
                <div class="w-20 h-20 bg-gradient-to-br from-sky-500 via-cyan-600 to-sky-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fab fa-twitter text-4xl text-white mb-4"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ app()->getLocale() == 'ar' ? 'تويتر' : 'Twitter' }}</h3>
                <p class="text-gray-600 mb-4">{{ app()->getLocale() == 'ar' ? 'تابعنا على تويتر للحصول على آخر التحديثات والأخبار والعروض الخاصة بفعاليتنا. تابع تغريداتنا للحصول على أخبار عاجلة.' : 'Follow us on Twitter for real-time updates, event announcements, and industry news.' }}</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://twitter.com/yourprofile" target="_blank" class="inline-flex items-center justify-center bg-gradient-to-r from-cyan-600 to-sky-600 text-white px-6 py-3 rounded-lg hover:from-cyan-700 hover:to-sky-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fab fa-twitter mr-2"></i>
                        <span>{{ app()->getLocale() == 'ar' ? 'تابعنا' : 'Follow on Twitter' }}</span>
                    </a>
                    <a href="https://twitter.com/yourprofile" target="_blank" class="w-full bg-gradient-to-r from-cyan-600 to-sky-600 text-white font-bold py-4 px-6 rounded-xl hover:from-cyan-700 hover:to-sky-700 transition-all duration-300 transform hover:scale-105 shadow-xl">
                        <i class="fab fa-twitter mr-2"></i>
                        {{ app()->getLocale() == 'ar' ? 'استكشف المزيد' : 'View Twitter Profile' }}
                </a>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 rounded-2xl p-12 text-center" data-aos="fade-up" data-aos-delay="500">
                <h2 class="text-3xl font-bold text-white mb-6">{{ app()->getLocale() == 'ar' ? 'هل لديك سؤال؟' : 'Have Questions?' }}</h2>
                <p class="text-gray-200 text-lg mb-8 max-w-3xl mx-auto">
                    {{ app()->getLocale() == 'ar' ? 'فريقنا جاهز للإجابة على جميع استفساراتكم وتقديم الدعم اللازم. لا تتردوا عليكم أبداً!' : 'Our dedicated support team is ready to answer all your questions and provide the assistance you need.' }}
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="mailto:info@eventtime.com" class="inline-flex items-center justify-center bg-white text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-800 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>{{ app()->getLocale() == 'ar' ? 'راسلنا بريد إلكتروني' : 'Email Us' }}</span>
                    </a>
                    <a href="tel:+966500000000" class="inline-flex items-center justify-center bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-phone mr-2"></i>
                        <span>{{ app()->getLocale() == 'ar' ? 'مكالمة هاتفية' : 'Call Us' }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
