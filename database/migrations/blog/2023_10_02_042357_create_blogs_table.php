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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blog_categories_id')->nullable();
            $table->string('title', 200)->nullable();
            $table->string('writer', 100)->nullable();
            $table->string('published_date', 100)->nullable();
            $table->tinyInteger('is_published')->default(0);
            $table->string('image', 250)->nullable();
            $table->string('image_alt', 100)->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 150)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
