<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');                      // عنوان المشروع
            $table->string('tags');                       // التقنيات (مثل: Laravel, PHP, JavaScript, MySQL)
            $table->text('description');                  // الوصف الأساسي
            $table->text('extra_description')->nullable();// الوصف الإضافي (Extra details)
            $table->string('github_link')->nullable();    // رابط الـ GitHub
            $table->string('demo_link')->nullable();      // رابط الـ Live Demo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
