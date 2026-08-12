<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المشروع</title>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
</head>
<body class="dashboard-body">
    <div class="container" style="max-width: 600px; margin-top: 40px;">
        <h2>تعديل بيانات المشروع</h2>
        
        <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            <div id="project-tags-data" data-tags="{{ $project->tags ?? '' }}" style="display: none;"></div>    
            @csrf
            @method('PUT')

            <label>لغة المشروع:</label>
            <select name="locale">
                <option value="ar" {{ $project->locale == 'ar' ? 'selected' : '' }}>عربي (ar)</option>
                <option value="en" {{ $project->locale == 'en' ? 'selected' : '' }}>إنجليزي (en)</option>
            </select>

            <label>عنوان المشروع:</label>
            <input type="text" name="title" value="{{ $project->title }}" required>

            <div class="form-group">
                <label for="tag-input">التقنيات المستخدمة</label>
                <input type="text" id="tag-input" class="form-control" placeholder="اكتب التقنية ثم اضغط Enter (مثلاً: Laravel)">
                <small class="text-muted">التاقات المضافة ستظهر بالأسفل، ويمكنك حذف أي تاق بالضغط عليه.</small>

                <div id="tags-container" style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px;"></div>
                <div id="hidden-inputs-container"></div>
            </div>

            <label>تحديث الصورة (اختياري):</label>
            @if($project->image)
                <div style="margin-bottom: 8px;"><img src="{{ asset($project->image) }}" width="80" style="border-radius:4px;"></div>
            @endif
            <input type="file" name="image" accept="image/*" style="padding: 7px;">

            <div class="form-group">
                <label for="is_featured">عرض في الصفحة الرئيسية؟</label>
                <select name="is_featured" id="is_featured" class="form-control">
                    <option value="0" {{ $project->is_featured == 0 ? 'selected' : '' }}>لا</option>
                    <option value="1" {{ $project->is_featured == 1 ? 'selected' : '' }}>نعم</option>
                </select>
            </div>

            <label>الوصف:</label>
            <textarea name="description" required>{{ $project->description }}</textarea>

            <label>وصف إضافي:</label>
            <textarea name="extra_description">{{ $project->extra_description }}</textarea>

            <label>رابط GitHub:</label>
            <input type="url" name="github_link" value="{{ $project->github_link }}">

            <label>رابط الديمو:</label>
            <input type="url" name="demo_link" value="{{ $project->demo_link }}">

            <div class="form-actions">
                <button type="submit" class="btn-save" onclick="this.disabled=true; this.form.submit();">حفظ التعديلات</button>
                <a href="/admin-panel#projects-tab" class="btn-cancel-edit">إلغاء</a>
            </div>
        </form>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tagInput = document.getElementById('tag-input');
        const tagsContainer = document.getElementById('tags-container');
        const hiddenInputsContainer = document.getElementById('hidden-inputs-container');
        
        let tagsArray = [];

        // جلب البيانات بطريقة HTML/JS بحتة (بدون أي PHP داخل السكربت)
        const dataElement = document.getElementById('project-tags-data');
        if (dataElement) {
            const rawTags = dataElement.getAttribute('data-tags');
            if (rawTags && rawTags.trim() !== "") {
                tagsArray = rawTags.split(',').map(tag => tag.trim());
            }
        }

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

        // استدعاء الدالة فور تحميل الصفحة لعرض التاقات القديمة
        updateTagsUI();

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