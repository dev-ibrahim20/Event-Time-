<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'وقت الحدث - تجهيز المؤتمرات والمعارض والخيام الأوروبية')</title>
    <meta name="description" content="@yield('description', 'شركة وقت الحدث الرائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية بأعلى معايير الجودة والاحترافية في المملكة العربية السعودية')">
    <meta name="keywords" content="تجهيز مؤتمرات, خيام أوروبية, معارض, حفلات, تجهيز فعاليات, event time, event management, saudi arabia, riyadh">
    <meta name="author" content="وقت الحدث">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="language" content="{{ app()->getLocale() }}">
    <meta name="revisit-after" content="7 days">
    <meta name="geo.region" content="SA">
    <meta name="geo.placename" content="الرياض">
    <meta name="geo.position" content="24.7136;46.6753">
    <meta name="ICBM" content="24.7136,46.6753">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="وقت الحدث">
    <meta property="og:title" content="@yield('og:title', 'وقت الحدث - تجهيز المؤتمرات والمعارض')">
    <meta property="og:description" content="@yield('og:description', 'شركة رائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og-image', asset('assets/images/og-image.jpg')) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="{{ app()->getLocale() === 'ar' ? 'ar_SA' : 'en_US' }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@eventtime_sa">
    <meta name="twitter:creator" content="@eventtime_sa">
    <meta name="twitter:title" content="@yield('twitter:title', 'وقت الحدث - تجهيز المؤتمرات والمعارض')">
    <meta name="twitter:description" content="@yield('twitter:description', 'شركة رائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية')">
    <meta name="twitter:image" content="@yield('twitter-image', asset('assets/images/og-image.jpg')) }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Alternate Language Links -->
    <link rel="alternate" hreflang="ar" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="en" href="{{ url()->current() }}?lang=en">
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;900&family=Inter:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Styles -->
    @vite(['resources/assets/css/app.css'])
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">
    
    <!-- Schema.org structured data -->
    @yield('structured-data')
    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID', {
            'anonymize_ip': true,
            'custom_map': {'custom_parameter_1': 'language'}
        });
        gtag('event', 'language_dimension', {'language': '{{ app()->getLocale() }}'});
    </script>
    
    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="YOUR_VERIFICATION_CODE">
</head>
<body class="font-arabic antialiased bg-gray-50">
    <!-- Navigation -->
    @include('partials.nav')
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('partials.footer')
    

    <!-- Scripts -->
    @vite(['resources/assets/js/app.js'])
    
    <!-- WhatsApp Button -->
    <a href="https://wa.me/966500000000" target="_blank" class="fixed bottom-6 left-6 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-all duration-300 z-40 hover:scale-110">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>
    
    <!-- Notification Container -->
    <div id="notification-container"></div>
    
    <!-- Structured Data for Organization -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "وقت الحدث",
        "alternateName": "Event Time",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('assets/images/logo.png') }}",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+966500000000",
            "contactType": "customer service",
            "availableLanguage": ["Arabic", "English"]
        },
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "SA",
            "addressLocality": "الرياض",
            "addressRegion": "الرياض",
            "streetAddress": "حي النخيل، الرياض"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "24.7136",
            "longitude": "46.6753"
        },
        "openingHours": "Mo-Sa 08:00-18:00",
        "sameAs": [
            "https://www.facebook.com/eventtime",
            "https://www.twitter.com/eventtime",
            "https://www.instagram.com/eventtime",
            "https://www.linkedin.com/company/eventtime"
        ]
    }
    </script>
</body>
</html>
