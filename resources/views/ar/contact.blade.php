@extends('layouts.app-ar')

@section('content')
    
<section class="contact-section">
    <div class="contact-container">
        
        <!-- القسم الأيمن: النص التعريفي وطرق التواصل -->
        <div class="contact-info-side">
            <h2 class="contact-title">تواصل معي</h2>
            <p class="contact-subtitle">
                هل لديك مشروع في ذهنك؟ ترغب في مناقشة تعاون تقني، أو لديك فرصة متاحة؟ لا تتردد في التواصل. أنا دائماً متواجدة لبناء علاقات جديدة ومحادثات مثمرة.
            </p>
            
            <div class="contact-details">
                <div class="contact-item">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <a href="mailto:n44norah@gmail.com" class="email-link">
                        n44norah@gmail.com
                    </a>
                </div>
                <div class="contact-item">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><path d="M12 10a3 3 0 100-6 3 3 0 000 6z"/></svg>
                    <span> <b>القصيم، المملكة العربية السعودية</b> </span>
                </div>
            </div>
        </div>

        <!-- القسم الأيسر: نموذج الرسالة والتاغات التفاعلية -->
        <div class="contact-form-side">
            <form action="{{ route('contact.store.ar') }}" method="POST" class="contact-form" id="contactForm">
                @csrf <!-- مفتاح الأمان الضروري جداً -->

                <!-- رسالة النجاح تظهر هنا إذا تم الحفظ بنجاح -->
               @if(session('success'))
                    <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="name" placeholder="أدخل اسمك" required>
                </div>

                <div class="form-group">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني" required>
                </div>

                <!-- التاغات التفاعلية لاختيار سبب الرسالة -->
                <div class="form-group">
                    <label>ما هو سبب التواصل؟</label>
                    <div class="tags-container" id="tagsContainer">
                        <button type="button" class="reason-tag" data-value="Job Opportunity">فرصة وظيفية</button>
                        <button type="button" class="reason-tag" data-value="Project Inquiry">استفسار عن مشروع</button>
                        <button type="button" class="reason-tag" data-value="Technical Collaboration">تعاون تقني</button>
                        <button type="button" class="reason-tag" data-value="Networking & Connect">بناء علاقات مهنية</button>
                    </div>
                    <!-- حقل مخفي يحمل الـ name="subject" ليرتبط بقاعدة البيانات -->
                    <input type="hidden" name="subject" id="selectedReason" required>
                </div>

                <div class="form-group">
                    <label>رسالتك</label>
                    <textarea name="message" rows="4" placeholder="اكتب رسالتك هنا..." required></textarea>
                </div>

                <button type="submit" class="submit-btn">إرسال</button>
            </form>
        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tags = document.querySelectorAll('.reason-tag');
        const hiddenInput = document.getElementById('selectedReason');
        const container = document.getElementById('tagsContainer');

    tags.forEach(tag => {
        tag.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            
            // تخزين القيمة بالحقل المخفي
            hiddenInput.value = value;

            // إخفاء كل التاغات وعرض فقط التاغ المختار
            tags.forEach(t => {
                t.style.display = 'none';
                t.classList.remove('selected');
            });
            this.style.display = 'inline-block';
            this.classList.add('selected');

            // إضافة زر صغير لإلغاء الاختيار وتغييره
            if (!document.getElementById('resetTag')) {
                const resetBtn = document.createElement('button');
                resetBtn.type = 'button';
                resetBtn.id = 'resetTag';
                resetBtn.className = 'reset-tag-btn';
                resetBtn.innerText = 'تغيير الاختيار';
                
                resetBtn.addEventListener('click', function () {
                    hiddenInput.value = ''; // تفريغ الحقل المخفي
                    tags.forEach(t => {
                        t.style.display = 'inline-block';
                    });
                    this.remove(); // حذف زر التغيير
                });

                container.parentNode.appendChild(resetBtn);
            }
        });
    });
});
</script>

@endsection