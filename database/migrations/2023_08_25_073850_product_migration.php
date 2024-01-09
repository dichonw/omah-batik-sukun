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
        Schema::create('tb_product', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('product_name'); // Kolom nama
            $table->string('image'); // Kolom gambar
            $table->integer('price'); // Kolom harga
            $table->integer('discount')->nullable(); // Kolom dikon yang dapat bernilai null
            $table->string('description'); // Kolom dikon yang dapat bernilai null
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_product');
    }
};
