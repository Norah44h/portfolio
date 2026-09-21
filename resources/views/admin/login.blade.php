<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول لوحة التحكم</title>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
</head>
<body class="login-body">
    <div class="login-card">

        <!-- الشعار كـ رابط للصفحة الرئيسية -->
        <a href="{{ url('/ar/home') }}" style="display: block; text-align: center; margin-bottom: 20px;">
            <img src="{{ asset('images/logo.png') }}" alt="شعار الموقع" style="width: 80px; height: auto;">
        </a>

        <h2>تسجيل الدخول</h2>
        
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" required placeholder="name@example.com">
            
            <label>كلمة المرور</label>
            <input type="password" name="password" required placeholder="••••••••">
            
            <button type="submit" style="font-size: 16px;">دخول</button>
        </form>
    </div>
</body>
</html>