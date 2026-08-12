<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // عرض مشاريع الصفحة العربية
    public function indexArabic()
    {
        $projects = Project::where('locale', 'ar')->get();
        return view('ar.projects', compact('projects'));
    }

    // عرض مشاريع الصفحة الإنجليزية
    public function indexEnglish()
    {
        $projects = Project::where('locale', 'en')->get();
        return view('en.projects', compact('projects'));
    }
}