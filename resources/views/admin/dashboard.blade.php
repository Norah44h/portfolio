<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
</head>
<body class="dashboard-body">
    <div class="container">
        
        <!-- الشريط العلوي -->
        <div class="header-bar">
            <h2>لوحة التحكم</h2>
            <a href="{{ route('admin.logout') }}" class="logout-btn">تسجيل خروج</a>
        </div>

        @if(session('success'))
            <div class="success-msg">{{ session('success') }}</div>
        @endif

        <!-- أزرار التبويبات -->
        <div class="tabs-header">
            <button class="tab-btn active" onclick="switchTab(event, 'home-tab')">الرئيسية</button>
            <button class="tab-btn" onclick="switchTab(event, 'projects-tab')">إدارة المشاريع</button>
            <button class="tab-btn" onclick="switchTab(event, 'messages-tab')">إدارة الرسائل</button>
        </div>

        <!-- ================= تبويب 1: الرئيسية ================= -->
        <div id="home-tab" class="tab-content active">
            <div class="welcome-banner">
                <h3>لوحة القيادة والتحكم بالنظام</h3>
                <p>مرحباً بكِ، من هنا يمكنك متابعة حالة المشاريع البرمجية واستعراض أحدث مراسلات الزوار بسرعة.</p>
            </div>

            <div class="stats-grid">
                <!-- أحدث مشروع -->
                <div class="stat-card">
                    <h4>آخر مشروع مسجل</h4>
                    @php $latestProject = $projects->last(); @endphp
                    @if($latestProject)
                        <p style="margin-bottom: 6px;"><strong>العنوان:</strong> {{ $latestProject->title }}</p>
                        <p style="margin-bottom: 6px;"><strong>التقنيات:</strong> {{ $latestProject->tags }}</p>
                        <p style="font-size: 12px; color: #64748b;">اللغة: {{ $latestProject->locale }}</p>
                    @else
                        <p style="color: #64748b;">لا توجد مشاريع مضافة بعد.</p>
                    @endif
                </div>

                <!-- أحدث الرسائل -->
                <div class="stat-card">
                    <h4>أحدث الرسائل الواردة</h4>
                    @if(isset($messages) && count($messages) > 0)
                        @foreach($messages->take(3) as $m)
                            <div class="recent-message-item message-trigger" data-id="{{ $m->id }}">
                                <div class="msg-sender">{{ $m->name ?? 'زائر' }} ({{ $m->email }})</div>
                                <div class="msg-text">{{ Str::limit($m->message, 55) }}</div>
                            </div>
                        @endforeach
                    @else
                        <p style="color: #64748b; font-size: 13px;">لا توجد رسائل جديدة في الوقت الحالي.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- ================= تبويب 2: إدارة المشاريع ================= -->
        <div id="projects-tab" class="tab-content">
            <h3>إضافة مشروع جديد</h3>
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>لغة المشروع:</label>
                <select name="locale">
                    <option value="ar">عربي (ar)</option>
                    <option value="en">إنجليزي (en)</option>
                </select>

                <label>عنوان المشروع:</label>
                <input type="text" name="title" required placeholder="عنوان المشروع">

                <div class="form-group">
                    <label for="tag-input">التقنيات المستخدمة</label>
                    <input type="text" id="tag-input" class="form-control" placeholder="اكتب التقنية ثم اضغط Enter (مثلاً: Laravel)">
                    <small class="text-muted">التاقات المضافة ستظهر بالأسفل، ويمكنك حذف أي تاق بالضغط عليه.</small>

                    <div id="tags-container" style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px;"></div>
                    <div id="hidden-inputs-container"></div>
                </div>

                <label>صورة المشروع:</label>
                <input type="file" name="image" accept="image/*" required style="padding: 7px;">

                <div class="form-group">
                    <label for="is_featured">عرض في الصفحة الرئيسية؟</label>
                    <select name="is_featured" id="is_featured" class="form-control">
                        <option value="0">لا</option>
                        <option value="1">نعم</option>
                    </select>
                </div>

                <label>الوصف:</label>
                <textarea name="description" required placeholder="وصف المشروع..."></textarea>

                <label>وصف إضافي:</label>
                <textarea name="extra_description" placeholder="تفاصيل..."></textarea>

                <label>رابط GitHub:</label>
                <input type="url" name="github_link" placeholder="https://github.com/...">

                <label>رابط الديمو:</label>
                <input type="url" name="demo_link" placeholder="https://...">

                <button type="submit" class="btn-save" onclick="this.disabled=true; this.form.submit();">حفظ</button>
            </form>

            <hr style="margin: 25px 0; border: 0; border-top: 1px solid #e2e8f0;">

            <h3>المشاريع الحالية (عرض احترافي)</h3>
            
            <div class="projects-grid">
                @foreach($projects as $p)
                <div class="project-admin-card">
                    @if($p->image)
                        <img src="{{ asset($p->image) }}" alt="{{ $p->title }}" class="project-admin-img">
                    @else
                        <div class="project-admin-img" style="display:flex; align-items:center; justify-content:center; color:#94a3b8; font-size:12px;">بدون صورة</div>
                    @endif
                    
                    <div class="project-admin-info">
                        <h4>{{ $p->title }} <span style="font-size:11px; color:#4f46e5; background:#e0e7ff; padding:2px 6px; border-radius:4px; float:left;">{{ $p->locale }}</span></h4>
                        <p>{{ Str::limit($p->description, 60) }}</p>
                    </div>

                    <div class="project-admin-actions">
                        <a href="{{ route('admin.project.edit', $p->id) }}" class="btn-action btn-edit">تعديل</a>
                        <form action="{{ route('admin.delete', $p->id) }}" method="POST" onsubmit="return confirm('متأكد من الحذف؟')" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-action btn-delete">حذف</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- ================= تبويب 3: إدارة الرسائل ================= -->
        <div id="messages-tab" class="tab-content">
            <h3>سجل الرسائل الواردة</h3>
            @if(isset($messages) && count($messages) > 0)
                @foreach($messages as $msg)
                <div class="message-card" id="msg-{{ $msg->id }}">
                    <p><strong>المرسل:</strong> {{ $msg->name ?? 'زائر' }} ({{ $msg->email }})</p>
                    <p style="margin-top: 5px;"><strong>الرسالة:</strong> {{ $msg->message }}</p>
                    
                    @if($msg->reply)
                        <div class="reply-status-box">
                            <span class="reply-badge">تم الرد ✓</span>
                            <p style="margin-top: 6px;"><strong>الرد المسجل:</strong> {{ $msg->reply }}</p>
                        </div>

                        <div class="message-actions-row" style="margin-top: 10px;">
                            <form action="{{ route('admin.message.delete', $msg->id) }}" method="POST" onsubmit="return confirm('حذف هذه الرسالة؟')" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-action btn-delete">حذف</button>
                            </form>
                        </div>
                    @else
                        <form action="{{ route('admin.message.reply', $msg->id) }}" method="POST" style="margin-top: 12px;">
                            @csrf
                            <label style="font-size: 13px; margin-top: 0;">كتابة رد:</label>
                            <textarea name="reply" class="reply-textarea" required></textarea>
                            
                            <div class="message-actions-row" style="margin-top: 10px;">
                                <button type="submit" class="btn-action btn-reply">إرسال</button>
                        </form>
                                <form action="{{ route('admin.message.delete', $msg->id) }}" method="POST" onsubmit="return confirm('حذف هذه الرسالة؟')" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete">حذف</button>
                                </form>
                            </div>
                    @endif
                </div>
                @endforeach
            @else
                <p style="color: #64748b; text-align: center; padding: 20px;">لا توجد رسائل واردة حالياً.</p>
            @endif
        </div>

    </div>

<script>
    function switchTab(evt, tabId) {
        let contents = document.getElementsByClassName("tab-content");
        for (let c of contents) { c.classList.remove("active"); }

        let buttons = document.getElementsByClassName("tab-btn");
        for (let b of buttons) { b.classList.remove("active"); }

        document.getElementById(tabId).classList.add("active");
        if(evt && evt.currentTarget) {
            evt.currentTarget.classList.add("active");
        }
        localStorage.setItem('active_admin_tab', tabId);
    }

    document.addEventListener("DOMContentLoaded", function() {
        let savedTab = localStorage.getItem('active_admin_tab');
        if (savedTab && document.getElementById(savedTab)) {
            let contents = document.getElementsByClassName("tab-content");
            for (let c of contents) { c.classList.remove("active"); }
            document.getElementById(savedTab).classList.add("active");

            let buttons = document.getElementsByClassName("tab-btn");
            for (let b of buttons) { b.classList.remove("active"); }
            
            let targetBtn = document.querySelector(`button[onclick*="${savedTab}"]`);
            if (targetBtn) { targetBtn.classList.add("active"); }
        }

        const triggers = document.querySelectorAll('.message-trigger');
        triggers.forEach(item => {
            item.addEventListener('click', function() {
                const msgId = this.getAttribute('data-id');
                let msgBtn = document.querySelector("button[onclick*='messages-tab']");
                switchTab(null, 'messages-tab');
                
                let buttons = document.getElementsByClassName("tab-btn");
                for (let b of buttons) { b.classList.remove("active"); }
                if(msgBtn) msgBtn.classList.add("active");

                setTimeout(() => {
                    let targetMsg = document.getElementById('msg-' + msgId);
                    if (targetMsg) {
                        targetMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        targetMsg.style.borderColor = '#4f46e5';
                        targetMsg.style.boxShadow = '0 0 10px rgba(79, 70, 229, 0.2)';
                        setTimeout(() => { 
                            targetMsg.style.borderColor = '#e2e8f0'; 
                            targetMsg.style.boxShadow = 'none';
                        }, 2000);
                    }
                }, 100);
            });
        });
    });

    // سكربت التاقات التفاعلي
    document.addEventListener("DOMContentLoaded", function () {
        const tagInput = document.getElementById('tag-input');
        const tagsContainer = document.getElementById('tags-container');
        const hiddenInputsContainer = document.getElementById('hidden-inputs-container');

        let tagsArray = [];

        function updateTagsUI() {
            tagsContainer.innerHTML = '';
            hiddenInputsContainer.innerHTML = '';

            tagsArray.forEach((tag, index) => {
                const badge = document.createElement('div');
                badge.className = 'custom-badge';
                badge.style.cssText = "background-color: #e0f2fe; color: #0369a1; padding: 5px 12px; border-radius: 20px; font-size: 13px; display: inline-flex; align-items: center; gap: 6px; cursor: pointer;";
                badge.innerHTML = `${tag} <span style="font-weight: bold; color: #ef4444;" onclick="removeTag(${index})">&times;</span>`;
                tagsContainer.appendChild(badge);

                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'tags[]';
                hiddenInput.value = tag;
                hiddenInputsContainer.appendChild(hiddenInput);
            });
        }

        window.removeTag = function(index) {
            tagsArray.splice(index, 1);
            updateTagsUI();
        };

        if (tagInput) {
            tagInput.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    const val = tagInput.value.trim().replace(',', '');
                    if (val && !tagsArray.includes(val)) {
                        tagsArray.push(val);
                        tagInput.value = '';
                        updateTagsUI();
                    }
                }
            });
        }
    });
</script>
</body>
</html>