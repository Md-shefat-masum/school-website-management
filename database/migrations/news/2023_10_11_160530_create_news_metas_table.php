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
        Schema::create('news_metas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('news_id')->nullable();
            $table->bigInteger('news_category_id')->nullable();
            $table->enum('type', ['title', 'description', 'keyword', 'tag', 'schema_tag'])->nullable();
            $table->text('value')->nullable();
            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_metas');
    }
};
