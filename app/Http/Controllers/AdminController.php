<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // عرض لوحة التحكم بتبويبي المشاريع والرسائل
    public function index()
    {
        if (!session('admin_logged_in')) {
            return view('admin.login');
        }
        $projects = Project::all();
        $messages = ContactMessage::latest()->get();
        return view('admin.dashboard', compact('projects', 'messages'));
    }

    public function login(Request $request)
    {
        if ($request->email === env('ADMIN_EMAIL') && $request->password === env('ADMIN_PASSWORD')) {
            session(['admin_logged_in' => true]);
            return redirect('/admin-panel');
        }
        return back()->with('error', 'البيانات غير صحيحة!');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect('/admin-panel');
    }

    // --- إدارة المشاريع ---
    public function store(Request $request)
    {
        if (!session('admin_logged_in')) return redirect('/admin-panel');
        
        $data = $request->except(['image', 'tags']);

        // معالجة رفع الصورة
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        // معالجة التاقات (دمج المصفوفة إلى نص مفصول بفواصل)
        if ($request->has('tags') && is_array($request->tags)) {
            $data['tags'] = implode(', ', $request->tags);
        } else {
            $data['tags'] = null;
        }

        Project::create($data);
        return redirect('/admin-panel#projects-tab')->with('success', 'تم إضافة المشروع مع الصورة بنجاح!');
    }

    public function destroy($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin-panel');
        Project::destroy($id);
        return redirect('/admin-panel#projects-tab')->with('success', 'تم حذف المشروع!');
    }

    // --- دالة عرض صفحة التعديل للمشروع ---
    public function editProject($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin-panel#projects-tab');
        }
        
        $project = Project::findOrFail($id);
        return view('admin.edit-project', compact('project'));
    }

    // --- دالة حفظ التعديلات في القاعدة ---
    public function updateProject(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect('/admin-panel#projects-tab');
        
        $project = Project::findOrFail($id);
        $data = $request->except(['image', 'tags']);

        // تحديث الصورة إذا تم رفع صورة جديدة
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['image'] = 'uploads/' . $filename;
        }

        // معالجة التاقات
        if ($request->has('tags') && is_array($request->tags)) {
            $data['tags'] = implode(', ', $request->tags);
        } else {
            $data['tags'] = null;
        }

        $project->update($data);
        return redirect('/admin-panel#projects-tab')->with('success', 'تم تحديث المشروع بنجاح!');
    }

    // --- إدارة الرسائل والردود ---
    public function replyMessage(Request $request, $id)
    {
        if (!session('admin_logged_in')) return redirect('/admin-panel');
        
        $msg = ContactMessage::findOrFail($id);
        $msg->update(['reply' => $request->reply, 'is_read' => true]);
        
        return redirect('/admin-panel#messages-tab')->with('success', 'تم إرسال وحفظ الرد على الرسالة بنجاح!');
    }

    public function deleteMessage($id)
    {
        if (!session('admin_logged_in')) return redirect('/admin-panel');
        ContactMessage::destroy($id);
        return redirect('/admin-panel#messages-tab')->with('success', 'تم حذف الرسالة!');
    }
}