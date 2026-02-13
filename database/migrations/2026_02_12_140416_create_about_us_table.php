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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('company_introduction_ar')->nullable();
            $table->text('company_introduction_en')->nullable();
            $table->text('mission_ar')->nullable();
            $table->text('mission_en')->nullable();
            $table->text('vision_ar')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('core_values_ar')->nullable();
            $table->text('core_values_en')->nullable();
            $table->text('message_ar')->nullable();
            $table->text('message_en')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
