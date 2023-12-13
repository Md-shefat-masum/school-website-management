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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_category_id')->nullable();
            $table->string('title', 100)->nullable();
            $table->string('writer', 100)->nullable();
            $table->string('published_date', 100)->nullable();
            $table->tinyInteger('is_published')->default(0);
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('image', 200)->nullable();
            $table->text('image_alt')->nullable();
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
        Schema::dropIfExists('news');
    }
};
