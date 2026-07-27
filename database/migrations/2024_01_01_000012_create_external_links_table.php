<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('external_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('General');
            $table->string('url');
            $table->string('link_label')->nullable();      // button label, e.g. "Visit ISO.org"
            $table->string('icon')->default('globe');      // x-icon name
            $table->string('logo_path')->nullable();       // optional uploaded logo
            $table->text('excerpt')->nullable();           // short card summary
            $table->longText('content')->nullable();       // rich HTML — full company/org overview
            $table->string('note')->nullable();            // highlighted note
            $table->string('topics')->nullable();          // comma-separated tags
            $table->unsignedInteger('sort_order')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('external_links');
    }
};
