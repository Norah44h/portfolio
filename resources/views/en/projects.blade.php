@extends('layouts.app')

@section('content')
    <section class="new-projects-section">
        <h2 class="new-projects-heading">My Projects</h2>
        <p class="new-projects-subtitle">A showcase of technical systems, web applications, and engineering milestones.</p>

        <!-- شبكة المشاريع الجديدة (3 أعمدة للكمبيوتر وعمود واحد للجوال) -->
        <div class="new-projects-grid">

            @foreach($projects as $project)
                <article class="new-proj-card" onclick="toggleProjDetails(this)">
                    <div class="new-proj-img-box">
                        @if($project->image)
                            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: inherit;">
                        @else
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="16 18 22 12 16 6"></polyline>
                                <polyline points="8 6 2 12 8 18"></polyline>
                            </svg>
                        @endif
                    </div>
                    <div class="new-proj-body">
                        <!-- عنوان المشروع من قاعدة البيانات -->
                        <h3 class="new-proj-title">{{ $project->title }}</h3>
            
                        <!-- التقنيات (Tags) -->
                        <div class="new-proj-tags">
                            @if($project->tags)
                                @foreach(explode(',', $project->tags) as $tag)
                                    <span>{{ trim($tag) }}</span>
                                @endforeach
                            @endif
                        </div>

                        <!-- الوصف الأساسي والإضافي من قاعدة البيانات -->
                        <p class="new-proj-desc">
                            {{ $project->description }}
                            @if($project->extra_description)
                                <span class="new-proj-extra">{{ $project->extra_description }}</span>
                            @endif
                        </p>

                        <!-- الروابط (GitHub و Live Demo) -->
                        <div class="new-proj-actions">
                            @if($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank" class="new-proj-btn new-github" onclick="event.stopPropagation()">GitHub</a>
                            @endif
                
                           @if($project->demo_link)
                                <a href="{{ $project->demo_link }}" target="_blank" class="new-proj-btn new-demo" onclick="event.stopPropagation()">Live Demo</a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach

            <!-- الكرت الفارغ (مشاريع قادمة) -->
            <article class="new-proj-card new-empty-card">
                <div class="new-proj-img-box new-empty-img">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </div>
                <div class="new-proj-body">
                    <h3 class="new-proj-title" style="color: #9CA3AF;">Next Innovation In Progress</h3>
                    
                    <div class="new-proj-tags">
                        <span class="new-empty-tag"></span> 
                        <span class="new-empty-tag"></span>
                    </div>
                </div>
            </article>

        </div>
    </section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll('.new-proj-card:not(.new-empty-card)');

        cards.forEach(card => {
            const extraText = card.querySelector('.new-proj-extra');

            // --- تفاعل اللابتوب (Hover) ---
            card.addEventListener('mouseenter', function () {
                if (window.innerWidth > 1024) {
                    extraText.style.display = 'block';
                    setTimeout(() => extraText.style.opacity = '1', 10);

                    // التوسع للأسفل فقط (بدون أي صعود للأعلى أو لمس الهيدر)
                    card.style.height = 'auto'; // يتمدد طولياً حسب الكلام
                    card.style.boxShadow = '0 16px 35px rgba(37, 99, 235, 0.12)';
                    card.style.borderColor = '#93C5FD';
                    card.style.zIndex = '10'; // يرتفع طبقاتياً فوق ما تحته مباشرة دون أن يتحرك إحداثياً
                }
            });

            card.addEventListener('mouseleave', function () {
                if (window.innerWidth > 1024) {
                    // العودة للحالة الثابتة الموحدة
                    card.style.height = '400px';
                    card.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.04)';
                    card.style.borderColor = '#E5E7EB';
                    card.style.zIndex = '1';

                    extraText.style.opacity = '0';
                    setTimeout(() => extraText.style.display = 'none', 250);
                }
            });

            // --- تفاعل الجوال (Click مع إغلاق الباقي تلقائياً) ---
            card.addEventListener('click', function (e) {
                if (window.innerWidth <= 1024) {
                    e.stopPropagation();
                    const isOpen = card.classList.contains('proj-touch-active');

                    // إغلاق جميع الكروت المفتوحة أولاً
                    cards.forEach(c => {
                        c.classList.remove('proj-touch-active');
                        c.style.height = 'auto';
                        c.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.04)';
                        c.style.borderColor = '#E5E7EB';
                        const extra = c.querySelector('.new-proj-extra');
                        if (extra) {
                            extra.style.display = 'none';
                            extra.style.opacity = '0';
                        }
                    });

                    // إذا لم يكن مفتوحاً، فتحه وتوسيعه طولياً في مكانه
                    if (!isOpen) {
                        card.classList.add('proj-touch-active');
                        card.style.boxShadow = '0 12px 30px rgba(37, 99, 235, 0.12)';
                        card.style.borderColor = '#93C5FD';
                        extraText.style.display = 'block';
                        setTimeout(() => extraText.style.opacity = '1', 10);
                    }
                }
            });
        });
    });
</script>
@endsection