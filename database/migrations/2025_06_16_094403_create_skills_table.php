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
        Schema::create('skills', function (Blueprint $table) {
            // This matches your diagram's primary key
            $table->id('skill_id');
            
            // THIS IS THE CORRECTION
            // It correctly links this skill to a user via the user_id
           $table->foreignId('resume_id')->constrained('resumes', 'resume_id')->onDelete('cascade');

            // The rest of your columns
            $table->string('skill_name', 100);
            $table->string('level', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};