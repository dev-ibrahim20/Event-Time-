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
        Schema::table('team_members', function (Blueprint $table) {
            $table->string('twitter_link')->nullable()->after('image');
            $table->string('facebook_link')->nullable()->after('twitter_link');
            $table->string('linkedin_link')->nullable()->after('facebook_link');
            $table->string('instagram_link')->nullable()->after('linkedin_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn(['twitter_link', 'facebook_link', 'linkedin_link', 'instagram_link']);
        });
    }
};
