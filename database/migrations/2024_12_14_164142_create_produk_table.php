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
        Schema::create('produk', function (Blueprint $table) {
            $table->id(); // Primary key: id AUTO_INCREMENT
            $table->string('nama_produk'); // Nama produk
            $table->text('deskripsi')->nullable(); // Deskripsi produk
            $table->decimal('harga', 10, 2); // Harga produk dengan 2 digit desimal
            $table->integer('stok')->default(0); // Stok produk, default 0
            $table->string('foto')->nullable(); // Path foto produk
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
