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
        Schema::create('education', function (Blueprint $table) {
            // This matches the 'edu_id' primary key in your diagram
            $table->id('edu_id');

            // THIS IS THE MISSING LINE THAT MUST BE ADDED
            // It creates the 'user_id' column and links it to the 'users' table.
            $table->foreignId('resume_id')->constrained('resumes', 'resume_id')->onDelete('cascade');
            
            // The rest of your columns
            $table->string('school_name');
            $table->string('degree')->nullable();
            $table->string('field')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};