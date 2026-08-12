@extends('layouts.app-ar')

@section('content')
    
<section class="services-page-section">
    <h2 class="main-page-heading">ماذا أقدم</h2>

    <!-- حاوية الخدمات الرئيسية (هي المسؤولة عن الـ Scroll Snap) -->
    <div class="services-snap-container">

        <!-- الخدمة 1 -->
        <article class="service-card sticky-card">
            <div class="service-content">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                </div>
                <h3 class="service-title">1. تطوير الويب المتكامل (Full-Stack)</h3>
                <p class="service-desc">هندسة وبناء تطبيقات ويب ومنصات رقمية قوية وقابلة للتوسع من الصفر. تقديم واجهات مستخدم سلسة وعالية الأداء، مدعومة ببنية تحتية خلفية (Backend) آمنة ومحسنة وفقاً لأعلى المعايير الصناعية.</p>
                <div class="tech-tags">
                    <span>HTML/CSS</span> <span>JavaScript</span> <span>Laravel</span> <span>PHP</span> <span>Full-Stack Architecture</span> <span>إدارة قواعد البيانات</span>
                </div>
            </div>
        </article>

        <!-- الخدمة 2 -->
        <article class="service-card sticky-card">
            <div class="service-content">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="15" x2="23" y2="15"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="15" x2="4" y2="15"></line></svg>
                </div>
                <h3 class="service-title">2. هندسة البرمجيات وتصميم الأنظمة</h3>
                <p class="service-desc">تصميم بنى معمارية وهياكل بيانات معقدة بدقة متناهية. أتخصص في ربط واجهات البرمجة (API)، مبادئ الخدمات المصغرة (Microservices)، وكتابة أكواد نظيفة تضمن سهولة الصيانة والأمان والموثوقية الاستثنائية للنظام.</p>
                <div class="tech-tags">
                    <span>تصميم الأنظمة</span> <span>UML Modeling</span> <span>هندسة الـ API</span> <span>تحسين الخوارزميات</span> <span>البرمجة الكائنية (OOP)</span>
                </div>
            </div>
        </article>

        <!-- الخدمة 3 -->
        <article class="service-card sticky-card">
            <div class="service-content">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path><path d="M10.5 12.5a2.5 2.5 0 0 0 3 3"></path><path d="M14.5 8.5a2.5 2.5 0 0 0-3 3"></path><circle cx="12" cy="12" r="1"></circle></svg>
                </div>
                <h3 class="service-title">3. الحلول الذكية ودمج الذكاء الاصطناعي</h3>
                <p class="service-desc">توظيف أحدث تقنيات الذكاء الاصطناعي، ومسارات عمل استرجاع المعرفة (RAG)، وعمليات الأتمتة الذكية. دمج قدرات تعلم الآلة المتقدمة وواجهات البرمجة الحديثة لتمكين المنصات الرقمية بميزات ذكية من الجيل القادم.</p>
                <div class="tech-tags">
                    <span>الذكاء الاصطناعي</span> <span>تعلم الآلة</span> <span>أنظمة RAG</span> <span>سير عمل نماذج اللغات (LLMs)</span> <span>Groq API</span> <span>خطوط بيانات</span>
                </div>
            </div>
        </article>

        <!-- الخدمة 4 -->
        <article class="service-card sticky-card">
            <div class="service-content">
                <div class="service-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                </div>
                <h3 class="service-title">4. الاستشارات التقنية وتدقيق الأكواد</h3>
                <p class="service-desc">تقديم استشارات عالية المستوى في هندسة البرمجيات، مراجعة شاملة للأكواد (Code Review)، وضبط الأداء بدقة. تشخيص الاختناقات التقنية المعقدة وتقديم رؤى استراتيجية لرفع كفاءة البرمجة والتشغيل.</p>
                <div class="tech-tags">
                    <span>مراجعة الأكواد</span> <span>التدقيق التقني</span> <span>ضبط الأداء</span> <span>حل المشكلات</span> <span>أفضل الممارسات</span>
                </div>
            </div>
        </article>
        
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.6/bundled/lenis.min.js">
    // تفعيل التمرير الناعم (Lenis)
    const lenis = new Lenis({
        duration: 1.5,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        orientation: 'vertical',
        gestureOrientation: 'vertical',
        smoothWheel: true,
        smoothTouch: true,
        touchMultiplier: 1.5,
    })

    function raf(time) {
        lenis.raf(time)
        requestAnimationFrame(raf)
    }
    requestAnimationFrame(raf)
</script>
@endsection