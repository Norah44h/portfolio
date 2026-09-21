<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Http; 

class ContactController extends Controller
{
    // حفظ رسالة النسخة العربية مع التحقق وإرسالها لـ Formspree
    public function storeArabic(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 1. الحفظ في قاعدة البيانات المحلية (SQLite)
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // 2. الإرسال الخلفي لـ Formspree ليصلك الإيميل
        Http::post('https://formspree.io/f/mgavedvb', [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'تم إرسال رسالتك وحفظها بنجاح!');
    }

    // حفظ رسالة النسخة الإنجليزية مع التحقق وإرسالها لـ Formspree
    public function storeEnglish(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 1. الحفظ في قاعدة البيانات المحلية (SQLite)
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // 2. الإرسال الخلفي لـ Formspree ليصلك الإيميل
        Http::post('https://formspree.io/f/mgavedvb', [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}