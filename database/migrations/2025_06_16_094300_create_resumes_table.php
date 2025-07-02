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
    Schema::create('resumes', function (Blueprint $table) {
        $table->id('resume_id');
        // No change needed here, 'users' table has a primary key of 'id' by default
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
        // CORRECTION: Explicitly reference the 'template_id' column
        $table->foreignId('template_id')->nullable()->constrained(
            table: 'templates', column: 'template_id'
        )->onDelete('set null');

        // ... rest of the columns
        $table->string('name');
        $table->text('description')->nullable();
        $table->string('status', 50)->nullable();
        $table->unsignedInteger('views')->default(0);
        $table->text('image_url')->nullable();
        $table->text('code')->nullable();
        $table->string('share_url', 255)->nullable()->unique();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
