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
        Schema::create('tb_article', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('article_title'); // Kolom judul
            $table->string('image'); // Kolom gambar
            $table->string('description'); // Kolom deskripsu
            $table->string('optional_link')->nullable(); // Kolom opsional untuk link
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_article');
    }
};
