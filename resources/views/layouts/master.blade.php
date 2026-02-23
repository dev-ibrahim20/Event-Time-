<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'وقت الحدث - تجهيز المؤتمرات والمعارض والخيام الأوروبية')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">
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
    
    {{-- <!-- Social Media Toggle Button -->
    <button id="social-toggle" class="fixed left-4 top-4 bg-gray-800 text-white p-3 rounded-full shadow-lg z-[9998] hover:bg-gray-700 transition-all duration-300 transform hover:scale-110" style="position: fixed !important; left: 0.5rem !important; top: 14rem !important; z-index: 9998 !important;">
        <i class="fas fa-times text-lg"></i>
    </button> --}}
    
    {{-- <!-- Social Media Sidebar -->
    <div id="social-sidebar" class="fixed left-4 top-1/2 transform -translate-y-1/2 z-[9999] !important flex flex-col space-y-4 {{ app()->getLocale() === 'ar' ? 'space-y-reverse' : '' }} bg-gradient-to-br from-black via-gray-900 to-black  rounded-3xl p-6 shadow-2xl min-w-[180px] transition-all duration-500" style="position: fixed !important; left: -1rem !important; top: 16rem !important; z-index: 9999 !important; opacity: 1;" onmouseenter="this.style.opacity='1'; this.style.transition='opacity 0.5s'" onmouseleave="this.style.opacity='0'; this.style.transition='opacity 0.5s'">
        
        <!-- WhatsApp -->
        <a href="https://wa.me/966500000000?text={{ app()->getLocale() == 'ar' ? 'أريد استفسار عن خدماتكم' : 'I want to inquire about your services' }}" target="_blank" class="w-12 h-12 bg-green-600 text-white rounded-2xl flex items-center justify-center hover:bg-green-700 transition-all duration-300 transform hover:scale-110 shadow-2xl group relative overflow-hidden" onclick="window.open('https://wa.me/966500000000?text={{ app()->getLocale() == 'ar' ? 'أريد استفسار عن خدماتكم' : 'I want to inquire about your services' }}', '_blank')" onmouseenter="this.querySelector('#social-sidebar .fa-whatsapp').style.transform='rotate(15deg) scale(1.2)'" onmouseleave="this.querySelector('#social-sidebar .fa-whatsapp').style.transform='rotate(0deg) scale(1)'">
            <i class="fab fa-whatsapp text-lg group-hover:rotate-12 transition-transform duration-300 relative z-10"></i>    
        </a>
        
        <!-- Phone -->
        <a href="tel:+966500000000" target="_blank" class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center hover:bg-blue-700 transition-all duration-300 transform hover:scale-110 shadow-2xl group relative overflow-hidden" onclick="window.open('tel:+966500000000', '_blank')" onmouseenter="this.querySelector('#social-sidebar .fa-phone').style.transform='rotate(15deg) scale(1.2)'" onmouseleave="this.querySelector('#social-sidebar .fa-phone').style.transform='rotate(0deg) scale(1)'">
            <i class="fas fa-phone text-lg group-hover:rotate-12 transition-transform duration-300 relative z-10"></i>    
        </a>
        
        <!-- Instagram -->
        <a href="#" class="w-12 h-12 bg-red-600 text-white rounded-2xl flex items-center justify-center hover:bg-red-600 transition-all duration-300 transform hover:scale-110 shadow-2xl group relative overflow-hidden" onclick="window.open('https://instagram.com/yourprofile', '_blank')" onmouseenter="this.querySelector('#social-sidebar .fa-instagram').style.transform='rotate(15deg) scale(1.2)'" onmouseleave="this.querySelector('#social-sidebar .fa-instagram').style.transform='rotate(0deg) scale(1)'">
            <i class="fab fa-instagram text-lg group-hover:rotate-12 transition-transform duration-300 relative z-10"></i>    
        </a>
        
        <!-- Facebook -->
        <a href="#" class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center hover:bg-blue-700 transition-all duration-300 transform hover:scale-110 shadow-2xl group relative overflow-hidden" onclick="window.open('https://facebook.com/yourpage', '_blank')" onmouseenter="this.querySelector('#social-sidebar .fa-facebook-f').style.transform='rotate(15deg) scale(1.2)'" onmouseleave="this.querySelector('#social-sidebar .fa-facebook-f').style.transform='rotate(0deg) scale(1)'">
            <i class="fab fa-facebook-f text-lg group-hover:rotate-12 transition-transform duration-300 relative z-10"></i>    
        </a>
        
        <!-- Twitter -->
        <a href="#" class="w-12 h-12 bg-sky-500 text-white rounded-2xl flex items-center justify-center hover:bg-sky-600 transition-all duration-300 transform hover:scale-110 shadow-2xl group relative overflow-hidden" onclick="window.open('https://twitter.com/yourprofile', '_blank')" onmouseenter="this.querySelector('#social-sidebar .fa-twitter').style.transform='rotate(15deg) scale(1.2)'" onmouseleave="this.querySelector('#social-sidebar .fa-twitter').style.transform='rotate(0deg) scale(1)'">
            <i class="fab fa-twitter text-lg group-hover:rotate-12 transition-transform duration-300 relative z-10"></i>    
        </a>
        
        <!-- TikTok -->
        <a href="#" class="w-12 h-12 bg-black text-white rounded-2xl flex items-center justify-center hover:bg-gray-800 transition-all duration-300 transform hover:scale-110 shadow-2xl group relative overflow-hidden" onclick="window.open('https://tiktok.com/@yourprofile', '_blank')" onmouseenter="this.querySelector('#social-sidebar .fa-tiktok').style.transform='rotate(15deg) scale(1.2)'" onmouseleave="this.querySelector('#social-sidebar .fa-tiktok').style.transform='rotate(0deg) scale(1)'">
            <i class="fab fa-tiktok text-lg group-hover:rotate-12 transition-transform duration-300 relative z-10"></i>    
        </a>
    </div> --}}
    
    <!-- Notification Container -->
    <div id="notification-container" class="fixed top-4 right-4 z-[10000] pointer-events-none"></div>
    
    <!-- Scripts -->
    @vite(['resources/assets/js/app.js'])
    
    <!-- Social Media Notifications -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show notification function
            function showSocialNotification(platform, message) {
                const notification = document.createElement('div');
                notification.className = 'bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-lg shadow-xl mb-4 transform translate-x-full transition-all duration-500 flex items-center';
                notification.style.transform = 'translateX(0)';
                
                let icon = '';
                let color = '';
                
                switch(platform) {
                    case 'whatsapp':
                        icon = 'fab fa-whatsapp';
                        color = 'text-green-300';
                        break;
                    case 'phone':
                        icon = 'fas fa-phone';
                        color = 'text-blue-300';
                        break;
                    case 'instagram':
                        icon = 'fab fa-instagram';
                        color = 'text-pink-300';
                        break;
                    case 'facebook':
                        icon = 'fab fa-facebook-f';
                        color = 'text-blue-300';
                        break;
                    case 'twitter':
                        icon = 'fab fa-twitter';
                        color = 'text-sky-300';
                        break;
                    case 'tiktok':
                        icon = 'fab fa-tiktok';
                        color = 'text-gray-300';
                        break;
                }
                
                notification.innerHTML = `
                    <i class="${icon} ${color} text-xl ml-3"></i>
                    <span class="font-medium">${message}</span>
                    <div class="ml-auto">
                        <i class="fas fa-check-circle text-green-300"></i>
                    </div>
                `;
                
                const container = document.getElementById('notification-container');
                if (container) {
                    container.appendChild(notification);
                    
                    setTimeout(() => {
                        notification.style.transform = 'translateX(100%)';
                        setTimeout(() => {
                            notification.remove();
                        }, 500);
                    }, 3000);
                }
            }
            
            // Auto-hide sidebar after 1 minute
            let sidebarTimer;
            const sidebar = document.getElementById('social-sidebar');
            const toggleBtn = document.getElementById('social-toggle');
            let isSidebarVisible = true;
            
            // Show sidebar on page load
            if (sidebar) {
                sidebar.style.opacity = '1';
                isSidebarVisible = true;
                
                // Toggle button functionality
                if (toggleBtn) {
                    toggleBtn.addEventListener('click', () => {
                        if (isSidebarVisible) {
                            sidebar.style.opacity = '0';
                            isSidebarVisible = false;
                            toggleBtn.innerHTML = '<i class="fas fa-share-alt text-lg"></i>';
                        } else {
                            sidebar.style.opacity = '1';
                            isSidebarVisible = true;
                            toggleBtn.innerHTML = '<i class="fas fa-times text-lg"></i>';
                            // Reset timer when showing
                            clearTimeout(sidebarTimer);
                            sidebarTimer = setTimeout(() => {
                                sidebar.style.opacity = '0';
                                isSidebarVisible = false;
                                toggleBtn.innerHTML = '<i class="fas fa-share-alt text-lg"></i>';
                            }, 20000);
                        }
                    });
                }
                
                // Start timer to hide after 20 seconds
                sidebarTimer = setTimeout(() => {
                    sidebar.style.opacity = '0';
                    isSidebarVisible = false;
                    if (toggleBtn) {
                        toggleBtn.innerHTML = '<i class="fas fa-share-alt text-lg"></i>';
                    }
                }, 20000); // 20 seconds
                
                // Reset timer on mouse enter
                sidebar.addEventListener('mouseenter', () => {
                    clearTimeout(sidebarTimer);
                    sidebar.style.opacity = '1';
                    isSidebarVisible = true;
                    if (toggleBtn) {
                        toggleBtn.innerHTML = '<i class="fas fa-times text-lg"></i>';
                    }
                });
                
                // Restart timer on mouse leave
                sidebar.addEventListener('mouseleave', () => {
                    sidebarTimer = setTimeout(() => {
                        sidebar.style.opacity = '0';
                        isSidebarVisible = false;
                        if (toggleBtn) {
                            toggleBtn.innerHTML = '<i class="fas fa-share-alt text-lg"></i>';
                        }
                    }, 20000);
                });
            }
        });
    </script>
    
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
