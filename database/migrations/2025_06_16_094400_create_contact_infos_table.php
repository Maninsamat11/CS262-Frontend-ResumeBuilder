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
    Schema::create('contact_infos', function (Blueprint $table) {
        // This matches the 'info_id' primary key in your diagram
        $table->id('info_id');
        
        // This matches the 'user_id' foreign key in your diagram
        $table->foreignId('resume_id')->constrained('resumes', 'resume_id')->onDelete('cascade');
        
        // These match the other columns in your diagram
        $table->string('full_name');
        $table->string('phone')->nullable();
        $table->text('address')->nullable();
        $table->text('summary')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};
