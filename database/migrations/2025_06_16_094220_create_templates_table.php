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
    Schema::create('templates', function (Blueprint $table) {
        $table->id('template_id');
        $table->string('name', 100);
        $table->boolean('status')->nullable(); // tinyint(1) becomes boolean
        $table->longText('template_html');
        $table->text('template_url');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
