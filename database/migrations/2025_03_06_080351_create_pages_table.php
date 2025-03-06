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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('home_title')->nullable();
            $table->longText('home_description')->nullable();
            $table->string('home_button_text')->nullable();
            $table->string('about_us_header')->nullable();
            $table->longText('about_us_description')->nullable();
            $table->string('mission_header')->nullable();
            $table->longText('mission_description')->nullable();
            $table->string('vision_header')->nullable();
            $table->longText('vision_description')->nullable();
            $table->string('gallery_or_portfolio_title')->nullable();
            $table->string('gallery_or_portfolio_description')->nullable();
            $table->string('booking_title')->nullable();
            $table->longText('booking_title_description')->nullable();
            $table->string('booking_title_address')->nullable();
            $table->string('booking_description_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
