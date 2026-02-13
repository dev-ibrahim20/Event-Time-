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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->decimal('discount_percentage', 5, 2); // نسبة الخصم
            $table->date('start_date'); // تاريخ بدء العرض
            $table->date('end_date'); // تاريخ انتهاء العرض
            $table->boolean('status')->default(true); // حالة العرض
            $table->integer('sort_order')->default(0); // الترتيب
            $table->string('image')->nullable(); // صورة العرض
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
