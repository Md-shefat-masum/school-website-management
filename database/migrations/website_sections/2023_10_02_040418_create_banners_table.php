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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('background', 100)->nullable();
            $table->text('title')->nullable();
            $table->string('button_text', 100)->nullable();
            $table->string('button_url', 100)->nullable();
            $table->text('breaking_news')->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 250)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
