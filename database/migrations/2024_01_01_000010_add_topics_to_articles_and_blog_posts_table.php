<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('topics')->nullable()->after('category');
        });

        Schema::table('blog_posts', function (Blueprint $table) {
            $table->string('topics')->nullable()->after('note');
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('topics');
        });

        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn('topics');
        });
    }
};
