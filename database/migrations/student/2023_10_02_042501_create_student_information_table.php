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
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->nullable();
            $table->string('full_name', 200)->nullable();

            $table->bigInteger('class')->nullable();
            $table->string('department', 100)->nullable();

            $table->text('address')->nullable();
            $table->string('personal_phone_number', 40)->nullable();
            $table->string('parent_phone_number', 40)->nullable();
            $table->text('parent_details')->nullable();

            $table->string('image', 100)->nullable();


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
        Schema::dropIfExists('student_information');
    }
};
