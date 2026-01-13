<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hero_banners', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->nullable();
            $table->string('top_heading')->nullable();
            $table->string('bottom_heading')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
        DB::table('hero_banners')->insert([
            'top_heading' => 'Default Top Heading',
            'bottom_heading' => 'Default Bottom Heading',
            'description' => 'Default description',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_banners');
    }
};
