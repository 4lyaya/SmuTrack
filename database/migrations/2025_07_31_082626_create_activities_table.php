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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // misal: student_created, attendance_recorded, etc
            $table->text('description');
            $table->unsignedBigInteger('user_id')->nullable(); // user yang melakukan aksi
            $table->unsignedBigInteger('subject_id')->nullable(); // ID entitas terkait
            $table->string('subject_type')->nullable(); // Model entitas terkait
            $table->json('properties')->nullable(); // Data tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
