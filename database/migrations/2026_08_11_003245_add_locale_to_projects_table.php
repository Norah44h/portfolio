<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('locale')->default('ar')->after('id'); // يضيف عمود اللغة بعد الـ id ويجعل الافتراضي عربي
        });
    }
 
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('locale');
        });
    }
};
