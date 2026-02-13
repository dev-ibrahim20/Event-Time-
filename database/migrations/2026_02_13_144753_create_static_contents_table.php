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
        Schema::create('static_contents', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // مفتاح فريد لكل محتوى
            $table->text('value_ar')->nullable(); // المحتوى بالعربي
            $table->text('value_en')->nullable(); // المحتوى بالإنجليزي
            $table->string('type')->default('text'); // نوع المحتوى: text, image, email, phone, address, map
            $table->text('description_ar')->nullable(); // وصف إضافي بالعربي
            $table->text('description_en')->nullable(); // وصف إضافي بالإنجليزي
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_contents');
    }
};
