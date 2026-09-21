@extends('layouts.app')

@section('content')
<!-- قسم النبذة -->
<section class="hero-section">
    <div class="hero-container">
        
        <!-- النصف الأيسر -->
        <div class="hero-content">
            <h3 class="hero-title">
                Turning complex code into <br>
                <span class="highlight-text">intelligent & scalable systems.</span>
            </h3>

            <p class="hero-description">
                A Computer Science graduate passionate about building intelligent web applications, exploring machine learning workflows, and engineering clean, maintainable digital solutions.
            </p>

            <div class="hero-actions">
            <!-- رابط اعرف المزيد عني -->
                <a href="{{ route('en.about') }}" class="learn-more-link">
                    <span>Learn More About Me</span>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
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
        
        <!-- Left Side: Stacked Cards Container & Scroll Hint on top -->
        <div class="projects-visual-wrapper">
            <div class="cards-wrapper-inner">
                <!-- Scroll Hint positioned right above the cards -->
                <div class="scroll-hint">
                    <span>Scroll over cards to explore works</span>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>

                <div id="stacked-cards-container" class="stacked-cards-container">
                    
                    @php
                        $featuredProjects = \App\Models\Project::where('locale', 'en')
                            ->where('is_featured', 1)
                            ->latest()
                            ->take(3)
                            ->get();
                    @endphp

                    @forelse($featuredProjects as $project)
                        <!-- Card Template -->
                        <div class="project-card">
                            <div class="project-image-box">
                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                            </div>
                            <div class="project-info">
                                <h4 class="project-title">{{ $project->title }}</h4>
                                <p class="project-snippet">{{ $project->description }}</p>
                                <a href="{{ route('en.projects') }}" class="project-link">
                                    <span>Explore Details</span>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <!-- Default Card if no featured projects are selected -->
                        <div class="project-card">
                            <div class="project-info" style="text-align: center; padding: 40px;">
                                <h4 class="project-title">No Featured Projects Yet</h4>
                                <p class="project-snippet">Mark some projects as "Featured" from the dashboard to display them here.</p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>

        <!-- Right Side: Marketing Intro (Without the hint) -->
        <div class="projects-intro">
            <h3 class="section-title">
                Bringing ideas to life <br>
                <span class="highlight-text">with passion & precision</span>
            </h3>
            <p class="section-description">
                A curated selection of recent works and technical projects, showcasing end-to-end digital experiences and innovative solutions built with quality and craftsmanship.
            </p>
            <div class="projects-action">
                <a href="{{ route('en.projects') }}" class="projects-link">
                    <span>View All Projects</span>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- قسم التواصل -->
<section class="contact-preview-section">
    <div class="contact-preview-container">
        <div class="contact-preview-content">
            <h2 class="contact-title">Let's build something exceptional together</h2>
            <p class="contact-description">
                Currently exploring new opportunities in software engineering, AI systems, and technical collaborations. Feel free to reach out via email or head over to the contact page.
            </p>
            
            <div class="contact-actions">
                <a href="{{ route('en.services') }}" class="services-link">
                    <span>Explore My Services</span>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
                <!-- البريد الإلكتروني كرابط نقي بدون إطار وفي المنتصف -->
                <a href="mailto:n44norah@gmail.com" class="email-link">
                    n44norah@gmail.com
                </a>

                <!-- زر صفحة التواصل تحته مباشرة -->
                <a href="{{ route('en.contact') }}" class="btn-status-pill">
                    <span class="status-dot-wrapper">
                        <span class="status-dot"></span>
                    </span>
                    <span>Get in Touch</span>
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. FLOATING SKILLS BUBBLES SCRIPT
        const container = document.getElementById('floating-skills-container');
        if (container) {
            const baseSkills = [
                "Laravel", "PHP", "Python", "Java", "C++",
                "AI Workflows", "Machine Learning", "ChromaDB",
                "Groq API", "Tailwind CSS", "Git & GitHub", "RAG Systems"
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


        // 2. STACKED PROJECT CARDS SCRIPT
        const cardsContainer = document.getElementById('stacked-cards-container');
        if (cardsContainer) {
            let isAnimating = false;

            function rotateCard() {
                if (isAnimating) return;
                isAnimating = true;

                const cards = cardsContainer.querySelectorAll('.project-card');
                if (cards.length <= 1) {
                    isAnimating = false;
                    return;
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