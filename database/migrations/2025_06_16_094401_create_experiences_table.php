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
    Schema::create('experiences', function (Blueprint $table) {
        // This matches the 'exp_id' primary key in your diagram
        $table->id('exp_id');
        
        // THIS IS THE MISSING/INCORRECT LINE
        // It creates the 'user_id' column and links it to the users table
       $table->foreignId('resume_id')->constrained('resumes', 'resume_id')->onDelete('cascade');
        
        // These match the other columns in your diagram
        $table->string('company_name');
        $table->string('job_title');
        $table->date('start_date');
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
        Schema::dropIfExists('experiences');
    }
};
