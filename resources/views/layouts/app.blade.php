<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Norah Aldoghmani | Software Engineer</title>
    
    <meta name="description" content="Portfolio of Norah Aldoghmani, a Computer Science graduate and Software Engineer specializing in modern web development and AI workflows.">
    <meta name="keywords" content="Norah Aldoghmani, Software Engineer, Laravel, Python, Artificial Intelligence, Web Development, Qassim University">
    <meta name="author" content="Norah Aldoghmani">

    <!-- ربط ملفات لارافيل المركزية عبر Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-body">

    <!-- ================= HEADER SECTION ================= -->
    <header class="site-header">
        <div class="header-container">
            
            <!-- Logo & Brand -->
            <a href="#" class="brand-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Norah Logo" class="logo-img">
                <span class="brand-name">Norah Aldoghmani</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="nav-links">
                <a href="{{ route('en.home') }}">Home</a>
                <a href="{{ route('en.about') }}">About</a>
                <a href="{{ route('en.projects') }}">Projects</a>
                <a href="{{ route('en.services') }}">Services</a>
                <a href="{{ route('en.contact') }}">Contact</a>
    
                <!-- زر الانتقال للعربية مع البقاء في نفس الصفحة -->
                <a href="#" class="lang-switch-btn">العربية</a>
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
                    <a href="{{ route('en.home') }}">Home</a>
                    <a href="{{ route('en.about') }}">About</a>
                    <a href="{{ route('en.projects') }}">Projects</a>
                    <a href="{{ route('en.services') }}">Services</a>
                    <a href="{{ route('en.contact') }}">Contact</a>

                    <a href="#" class="lang-switch-btn">العربية</a>
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
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="footer-logo">
                    <span class="footer-brand-name">Norah Aldoghmani</span>
                </div>
                <p class="footer-bio">
                    Software Engineer & AI Enthusiast. <br>
                    Building clean architectures and smart systems.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links-list">
                    <li><a href="{{ route('en.about') }}">About Me</a></li>
                    <li><a href="{{ route('en.services') }}">Services</a></li>
                    <li><a href="{{ route('en.contact') }}">Get in Touch</a></li>
                    <li><a href="/admin-panel">Admin Panel</a></li>
                </ul>
            </div>

            <!-- Connect & Social -->
            <div class="footer-col">
                <h4 class="footer-heading">Connect</h4>
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/norah-aldoghmani" target="_blank" class="social-btn">LinkedIn</a>
                    <a href="https://github.com" target="_blank" class="social-btn">GitHub</a>
                </div>
                <p class="copyright-text">© 2026 Norah. All rights reserved.</p>
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