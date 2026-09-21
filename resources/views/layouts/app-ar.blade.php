<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نورة الدغماني | مهندسة برمجيات</title>
    
    <meta name="description" content="سيرة ذاتية.. نورة الدغماني، خريجة علوم حاسب ومهندسة برمجيات متخصصة في تطوير الويب الحديث وتقنيات الذكاء الاصطناعي.">
    <meta name="keywords" content="نورة الدغماني, مهندسة برمجيات, لاراكل, بايثون, الذكاء الاصطناعي, تطوير الويب, جامعة القصيم">
    <meta name="author" content="نورة الدغماني">

    <!-- ربط ملفات لارافيل المركزية عبر Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-body">

    <!-- ================= HEADER SECTION ================= -->
    <header class="site-header">
        <div class="header-container">
            
            <!-- Logo & Brand -->
            <a href="#" class="brand-logo">
                <img src="{{ asset('images/logo.png') }}" alt="شعار نورة" class="logo-img">
                <span class="brand-name">نورة الدغماني</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="nav-links">
                <a href="{{ route('ar.home') }}">الرئيسية</a>
                <a href="{{ route('ar.about') }}">من أنا</a>
                <a href="{{ route('ar.projects') }}">المشاريع</a>
                <a href="{{ route('ar.services') }}">الخدمات</a>
                <a href="{{ route('ar.contact') }}">تواصل معي</a>
    
                <!-- زر الانتقال للإنجليزية مع البقاء في نفس الصفحة أو العودة للرئيسية -->
                <a href="#" class="lang-switch-btn">English</a>       
            </nav>

            <!-- Mobile Menu Toggle Button -->
            <button type="button" id="menu-btn" class="mobile-toggle-btn">
                <svg style="width: 1.75rem; height: 1.75rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Close Button -->
            <button type="button" id="close-btn" class="mobile-toggle-btn" style="display: none;">
                ✕
            </button>

            <!-- القائمة المنسدلة للجوال -->
            <div id="mobile-menu" class="mobile-dropdown-menu">
                <nav style="display: flex; flex-direction: column; gap: 1rem;">
                    <a href="{{ route('ar.home') }}">الرئيسية</a>
                    <a href="{{ route('ar.about') }}">من أنا</a>
                    <a href="{{ route('ar.projects') }}">المشاريع</a>
                    <a href="{{ route('ar.services') }}">الخدمات</a>
                    <a href="{{ route('ar.contact') }}">تواصل معي</a>

                    <a href="#"  class="lang-switch-btn">English</a>          
                </nav>
            </div>

        </div>
    </header>

    <!-- ================= MAIN CONTENT AREA ================= -->
    <main class="site-main">
        @yield('content')
    </main>

    <!-- ================= FOOTER SECTION ================= -->
    <footer class="site-footer">
        <div class="footer-container">
            
            <!-- Brand & Bio -->
            <div class="footer-col">
                <div class="footer-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="الشعار" class="footer-logo">
                    <span class="footer-brand-name">نورة الدغماني</span>
                </div>
                <p class="footer-bio">
                    مهندسة برمجيات وشغوفة بالذكاء الاصطناعي.
                    <br> أبني بنى برمجية نظيفة وأنظمة ذكية.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4 class="footer-heading">روابط سريعة</h4>
                <ul class="footer-links-list">
                    <li><a href="{{ route('ar.about') }}">عني</a></li>
                    <li><a href="{{ route('ar.services') }}">الخدمات</a></li>
                    <li><a href="{{ route('ar.contact') }}">ابقى على تواصل</a></li>
                    <li><a href="/admin-panel">لوحة التحكم</a></li>
                </ul>
            </div>

            <!-- Connect & Social -->
            <div class="footer-col">
                <h4 class="footer-heading">التواصل الاجتماعي</h4>
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/norah-aldoghmani" target="_blank" class="social-btn">LinkedIn</a>
                    <a href="https://github.com/Norah44h" target="_blank" class="social-btn">GitHub</a>
                </div>
                <p class="copyright-text">© 2026 نورة. جميع الحقوق محفوظة.</p>
            </div>

        </div>
    </footer>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // نحدد كل أزرار تغيير اللغة في الصفحة (ديسكتوب وموبايل)
        const switchers = document.querySelectorAll('.lang-switch-btn');
        
        switchers.forEach(function (switcher) {
            switcher.addEventListener('click', function (e) {
                e.preventDefault();
                const currentPath = window.location.pathname;

                if (currentPath.includes('/ar/')) {
                    window.location.href = currentPath.replace('/ar/', '/en/');
                } else if (currentPath.includes('/en/')) {
                    window.location.href = currentPath.replace('/en/', '/ar/');
                } else {
                    window.location.href = '/ar/home';
                }
            });
        });
    });
</script>

</body>
</html>