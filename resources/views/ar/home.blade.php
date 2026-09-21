@extends('layouts.app-ar')

@section('content')
<!-- قسم النبذة -->
<section class="hero-section">
    <div class="hero-container">
        
        <!-- النصف الأيسر -->
        <div class="hero-content">
            <h3 class="hero-title">
                تحويل الأكواد المعقدة إلى <br>
                <span class="highlight-text">أنظمة ذكية وقابلة للتوسع.</span>
            </h3>

            <p class="hero-description">
                خريجة علوم حاسب شغوفة بتطوير تطبيقات ويب ذكية، استكشاف مسارات عمل تعلم الآلة، وهندسة حلول رقمية نظيفة وقابلة للصيانة.
            </p>

            <div class="hero-actions">
            <!-- رابط اعرف المزيد عني -->
                <a href="{{ route('ar.about') }}" class="learn-more-link">
                    <span>اعرف المزيد عني</span>
                    <svg style="transform: scaleX(-1);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <!-- النصف الأيمن -->
        <div class="hero-visual">
            <div id="floating-skills-container" class="floating-skills-container"></div>
        </div>

    </div>
</section>

<!-- قسم المشاريع -->
<section class="featured-projects-section">
    <div class="projects-container">
        
        <!-- الجانب الأيسر: حاوية البطاقات المكدسة وتلميح التمرير في الأعلى -->
        <div class="projects-visual-wrapper">
            <div class="cards-wrapper-inner">
                <!-- تلميح التمرير موضوع مباشرة فوق البطاقات -->
                <div class="scroll-hint">
                    <span>مرر فوق البطاقات لاستعراض الأعمال</span>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>

                <div id="stacked-cards-container" class="stacked-cards-container">
                    
                    @php
                        $featuredProjects = \App\Models\Project::where('locale', 'ar')
                            ->where('is_featured', 1)
                            ->latest()
                            ->take(3)
                            ->get();
                    @endphp

                    @forelse($featuredProjects as $project)
                        <!-- قالب بطاقة المشروع المميز -->
                        <div class="project-card">
                            <div class="project-image-box">
                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                            </div>
                            <div class="project-info">
                                <h4 class="project-title">{{ $project->title }}</h4>
                                <p class="project-snippet">{{ $project->description }}</p>
                                <a href="{{ route('ar.projects') }}" class="project-link">
                                    <span>استعراض التفاصيل</span>
                                    <svg style="transform: scaleX(-1);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <!-- بطاقة افتراضية في حال لم يتم تحديد مشاريع مميزة بعد -->
                        <div class="project-card">
                            <div class="project-info" style="text-align: center; padding: 40px;">
                                <h4 class="project-title">لا توجد مشاريع مميزة حالياً</h4>
                                <p class="project-snippet">قم بتحديد بعض المشاريع كـ "مميز" من لوحة التحكم لتظهر هنا.</p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

        <!-- الجانب الأيمن: المقدمة التسويقية -->
        <div class="projects-intro">
            <h3 class="section-title">
                نحيي الأفكار واقعاً <br>
                <span class="highlight-text">بشغف ودقة</span>
            </h3>
            <p class="section-description">
                مجموعة مختارة من الأعمال الحديثة والمشاريع التقنية، تعرض تجارب رقمية متكاملة وحلولاً مبتكرة مصممة بعناية وجودة عالية.
            </p>
            <div class="projects-action">
                <a href="{{ route('ar.projects') }}" class="projects-link">
                    <span>عرض كل المشاريع</span>
                    <svg style="transform: scaleX(-1);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- قسم التواصل -->
<section class="contact-preview-section">
    <div class="contact-preview-container">
        <div class="contact-preview-content">
            <h2 class="contact-title">لنقم ببناء شيء استثنائي معًا</h2>
            <p class="contact-description">
                أستكشف حاليًا فرصًا جديدة في هندسة البرمجيات، أنظمة الذكاء الاصطناعي، والتعاون التقني. لا تتردد في التواصل عبر البريد الإلكتروني أو إنتقل إلى صفحة التواصل.
            </p>
            
            <div class="contact-actions">
                <a href="{{ route('ar.services') }}" class="services-link">
                    <span>خدماتي</span>
                    <svg style="transform: scaleX(-1);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
                <!-- البريد الإلكتروني كرابط نقي بدون إطار وفي المنتصف -->
                <a href="mailto:n44norah@gmail.com" class="email-link">
                    n44norah@gmail.com
                </a>

                <!-- زر صفحة التواصل تحته مباشرة -->
                <a href="{{ route('ar.contact') }}" class="btn-status-pill">
                    <span class="status-dot-wrapper">
                        <span class="status-dot"></span>
                    </span>
                    <span>تواصل معي</span>
                </a>
            </div>
        </div>
    </div>
</section> 

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. سكربت فقاعات المهارات العائمة
        const container = document.getElementById('floating-skills-container');
        if (container) {
            const baseSkills = [
                "Laravel", "PHP", "Python", "Java", "C++",
                "AI", "ML", "ChromaDB", "RAG" ,
                "Groq API", "Tailwind CSS", "Git & GitHub"
            ];

            const skills = [...baseSkills, ...baseSkills];
            const total = skills.length;
            const step = 90 / total;

            skills.forEach((skill, index) => {
                const bubble = document.createElement('div');
                bubble.className = 'skill-bubble';
                bubble.textContent = skill;

                const exactLeft = (index * step) + (Math.random() * 2);
                const slowDuration = 16 + (Math.random() * 6);
                const negativeDelay = -(Math.random() * slowDuration);

                bubble.style.left = `${exactLeft}%`;
                bubble.style.animationDuration = `${slowDuration}s`;
                bubble.style.animationDelay = `${negativeDelay}s`;

                container.appendChild(bubble);
            });
        }

        // 2. سكربت بطاقات المشاريع المكدسة
        const cardsContainer = document.getElementById('stacked-cards-container');
        if (cardsContainer) {
            let isAnimating = false;

            function rotateCard() {
                if (isAnimating) return;
                isAnimating = true;

                const cards = cardsContainer.querySelectorAll('.project-card');
                if (cards.length <= 1) {
                    isAnimating = false;
                    return; // لو فيه بطاقة وحدة أو أقل ما نحتاج حركة تكديس
                }

                const topCard = cards[0];
                topCard.classList.add('swipe-out');

                setTimeout(() => {
                    topCard.classList.remove('swipe-out');
                    cardsContainer.appendChild(topCard); // نقل البطاقة الأولى للخلف
                    
                    setTimeout(() => {
                        isAnimating = false;
                    }, 200);
                }, 300);
            }

            // التحكم الدقيق بتمريرة الماوس
            cardsContainer.addEventListener('wheel', (e) => {
                e.preventDefault(); // منع النزول العام للصفحة أثناء التواجد فوق البطاقات
                
                if (Math.abs(e.deltaY) > 10 && !isAnimating) {
                    if (e.deltaY > 0) {
                        rotateCard(); // تمريرة واحدة للأسفل = تغيير بطاقة واحدة فقط
                    }
                }
            }, { passive: false });

            // النقر اليدوي أيضاً يغير بطاقة واحدة
            cardsContainer.addEventListener('click', () => {
                rotateCard();
            });
        }
    });
</script>
@endsection