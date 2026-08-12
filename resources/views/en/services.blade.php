@extends('layouts.app')

@section('content')
    
<section class="services-page-section">
    <h2 class="main-page-heading">What I Offer</h2>

    <!-- حاوية الخدمات الرئيسية (هي المسؤولة عن الـ Scroll Snap) -->
    <div class="services-snap-container">

        <!-- الخدمة 1 -->
        <article class="service-card sticky-card">
            <div class="service-content">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3 class="service-title">1. Full-Stack Web Development</h3>
                <p class="service-desc">Architecting and engineering robust, scalable web applications and digital platforms from the ground up. Delivering seamless, high-performance user interfaces coupled with secure, highly optimized backend infrastructures built to industry-leading standards.</p>
                <div class="tech-tags">
                    <span>HTML/CSS</span> <span>JavaScript</span> <span>Laravel</span> <span>PHP</span> <span>Full-Stack Architecture</span> <span>Database Management</span>
                </div>
            </div>
        </article>

        <!-- الخدمة 2 -->
        <article class="service-card sticky-card">
            <div class="service-content">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="15" x2="23" y2="15"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="15" x2="4" y2="15"></line></svg>
                </div>
                <h3 class="service-title">2. Software Architecture & System Design</h3>
                <p class="service-desc">Designing sophisticated system architectures and data structures with precision. Specializing in API integration, microservices principles, and clean code paradigms to ensure long-term maintainability, security, and exceptional system reliability.</p>
                <div class="tech-tags">
                    <span>System Design</span> <span>UML Modeling</span> <span>API Architecture</span> <span>Algorithm Optimization</span> <span>Object-Oriented Programming</span>
                </div>
            </div>
        </article>

        <!-- الخدمة 3 -->
        <article class="service-card sticky-card">
            <div class="service-content">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path><path d="M10.5 12.5a2.5 2.5 0 0 0 3 3"></path><path d="M14.5 8.5a2.5 2.5 0 0 0-3 3"></path><circle cx="12" cy="12" r="1"></circle></svg>
                </div>
                <h3 class="service-title">3. Smart Solutions & AI Integration</h3>
                <p class="service-desc">Leveraging cutting-edge artificial intelligence, Retrieval-Augmented Generation (RAG) pipelines, and intelligent automation workflows. Seamlessly integrating advanced machine learning capabilities and modern APIs to empower digital platforms with next-gen smart features.</p>
                <div class="tech-tags">
                    <span>Artificial Intelligence</span> <span>Machine Learning</span> <span>RAG Systems</span> <span>LLM Workflows</span> <span>Groq API</span> <span>Data Pipelines</span>
                </div>
            </div>
        </article>

        <!-- الخدمة 4 -->
        <article class="service-card sticky-card">
            <div class="service-content">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                </div>
                <h3 class="service-title">4. Technical Consultation & Code Auditing</h3>
                <p class="service-desc">Providing high-level software engineering consultations, comprehensive code reviews, and deep performance tuning. Diagnosing complex technical bottlenecks and delivering strategic insights to maximize code health and operational efficiency.</p>
                <div class="tech-tags">
                    <span>Code Review</span> <span>Technical Auditing</span> <span>Performance Tuning</span> <span>Problem Solving</span> <span>Best Practices</span>
                </div>
            </div>
        </article>
        
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.6/bundled/lenis.min.js">
    // تفعيل التمرير الناعم (Lenis)
const lenis = new Lenis({
    duration: 1.5, // زيدي هذا الرقم لجعل الحركة أبطأ وأكثر رومانسية (القيمة الافتراضية هي 1.2)
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // نوع الحركة
    orientation: 'vertical', // الاتجاه
    gestureOrientation: 'vertical',
    smoothWheel: true, // تفعيل النعومة على عجلة الفأرة
    smoothTouch: true, // تفعيل النعومة على اللمس (الجوال)
    touchMultiplier: 1.5, // سرعة اللمس
})

// ربط Lenis بسكرول المتصفح
function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}

requestAnimationFrame(raf)
</script>
@endsection