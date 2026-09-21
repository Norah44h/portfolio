@extends('layouts.app-ar')

@section('content')
    
    <section class="about-page-section">
        
        <!-- 1. رأس الصفحة والفلسفة الأساسية -->
        <div class="about-hero">
            <h1 class="about-title"> خريجة علوم حاسب | مهندسة برمجيات و مطورة ويب</h1>
            <p class="about-philosophy">
                علوم الحاسب أبعد بكثير من كونها مجرد شهادة أكاديمية; هي أداة شاملة لتحليل المشكلات المعقدة وهندسة الحلول الرقمية.
            </p>
        </div>

        <!-- 2 & 3. بطاقات الرحلة والمسيرة المنفصلة -->            
        <div class="journey-card-wrapper">
            <h2 class="section-heading">مسيرتي</h2>

            <!-- الحاوية الأم -->
            <div class="journey-grid-container">

                <!-- البطاقة الأولى: التدريب -->
                <div class="journey-card-item">
                    <div class="journey-item-content">
                        <span class="journey-date">يونيو 2026 – أغسطس 2026</span>
                        <h3 class="journey-item-title">مطورة ويب (Full-Stack)</h3>
                        <p class="journey-institution">شركة ديفوراسي (Devoraxy)</p>
                        <p class="journey-desc">
                            أتممت برنامج تدريب تعاوني مكثف في شركة ديفوراسي، وهي شركة متخصصة في الحلول التقنية والبرمجية تركز على بناء حلول رقمية حديثة، أنظمة متقدمة، وتطبيقات ويب وفق أحدث التقنيات والمعايير الصناعية العالية.
                        </p>
                    </div>
                </div>

                <!-- البطاقة الثانية: التعليم -->
                <div class="journey-card-item">
                    <div class="journey-item-content">
                        <span class="journey-date">2020 – 2026</span>
                        <h3 class="journey-item-title">البكالوريوس في علوم الحاسب</h3>
                        <p class="journey-institution">جامعة القصيم</p>
                        <p class="journey-desc">
                            غطيت نطاقاً شاملاً من المفاهيم الأكاديمية بما في ذلك هندسة الأنظمة، الخوارزميات، هياكل البيانات، مبادئ الشبكات، وأمن المعلومات، إلى جانب أسس متينة في تطوير الويب المتكامل (Full-Stack)، الذكاء الاصطناعي، وتعلم الآلة.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- 4. القدرات الأساسية والعقلية التقنية -->
        <div class="capabilities-section">
            <h2 class="section-heading">المهارات الأساسية والتقنية</h2>
            <div class="capabilities-box">
                <p>
                    أمتلك عقلية تقنية مرنة تمنحني مرونة عالية للتكيف السريع والعمل عبر مختلف مجالات البرمجة. أعتمد باستمرار على منهجية واضحة لتفكيك التعقيدات التقنية، وهندسة أنظمة مستقرة وفعالة تتوافق بسلاسة مع أهداف الأعمال، وتحسين تجربة المستخدم.
                </p>
                <p>
                    أستطيع هندسة البرمجيات من بنيتها الأساسية—إدارة أطر العمل وهياكل قواعد البيانات في الخلفية، مع تطوير واجهات الاستخدام الأمامية بالكامل وتطبيق معايير التصميم الاحترافية، إلى جانب دمج تطبيقات الذكاء الاصطناعي الذكية.
                </p>
            </div>
        </div>

        <!-- 5. رابط استعراض المشاريع (دعوة لاتخاذ إجراء) -->
        <div class="projects-cta-section">
            <a href="{{ route('ar.projects') }}" class="projects-cta-btn">
                <span>استعراض مشاريعي</span>
                <svg style="transform: scaleX(-1); position: relative; top: 2px;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
        </div>

    </section>

@endsection