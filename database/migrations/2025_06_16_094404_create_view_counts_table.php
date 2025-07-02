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
    Schema::create('view_counts', function (Blueprint $table) {
        $table->id();

        // CORRECTION: Explicitly reference the 'resume_id' column
        $table->foreignId('resume_id')->constrained(
            table: 'resumes', column: 'resume_id'
        )->onDelete('cascade');

        // This one is correct, as it links to the 'users' table which has a primary key of 'id'
        $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
        
        $table->unsignedInteger('count')->default(1);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_counts');
    }
};
