<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;


// ==================== مسارات النسخة العربية ====================
Route::get('/ar/home', function () { 
    return view('ar.home'); 
})->name('ar.home');

Route::get('/ar/about', function () { 
    return view('ar.about'); 
})->name('ar.about');

Route::get('/ar/projects', function () { 
    return view('ar.projects'); 
})->name('ar.projects');

Route::get('/ar/services', function () { 
    return view('ar.services'); 
})->name('ar.services');

Route::get('/ar/contact', function () { 
    return view('ar.contact'); 
})->name('ar.contact');


// ==================== مسارات النسخة الإنجليزية ====================
Route::get('/en/home', function () { 
    return view('en.home'); 
})->name('en.home');

Route::get('/en/about', function () { 
    return view('en.about'); 
})->name('en.about');

Route::get('/en/projects', function () { 
    return view('en.projects'); 
})->name('en.projects');

Route::get('/en/services', function () { 
    return view('en.services'); 
})->name('en.services');

Route::get('/en/contact', function () { 
    return view('en.contact'); 
})->name('en.contact');


// مسار استقبال الرسائل من الصفحة العربية
Route::post('/ar/contact/store', [ContactController::class, 'storeArabic'])->name('contact.store.ar');
// مسار استقبال الرسائل من الصفحة الإنجليزية
Route::post('/en/contact/store', [ContactController::class, 'storeEnglish'])->name('contact.store.en');


// صفحة المشاريع العربية
Route::get('/ar/projects', [ProjectController::class, 'indexArabic'])->name('ar.projects');
// صفحة المشاريع الإنجليزية
Route::get('/en/projects', [ProjectController::class, 'indexEnglish'])->name('en.projects');


// ==================== مسارات لوحة التحكم ====================
Route::get('/admin-panel', [AdminController::class, 'index']);
Route::post('/admin-login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');

// مسارات المشاريع
Route::post('/admin-panel/store', [AdminController::class, 'store'])->name('admin.store');
Route::delete('/admin-panel/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
Route::get('/admin-panel/project/edit/{id}', [AdminController::class, 'editProject'])->name('admin.project.edit');
Route::put('/admin-panel/project/update/{id}', [AdminController::class, 'updateProject'])->name('admin.project.update');

// مسارات الرسائل
Route::post('/admin-panel/message/reply/{id}', [AdminController::class, 'replyMessage'])->name('admin.message.reply');
Route::delete('/admin-panel/message/delete/{id}', [AdminController::class, 'deleteMessage'])->name('admin.message.delete');