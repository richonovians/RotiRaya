<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk produk.
     *
     * @return void
     */
    public function run()
    {
        // Membuat 10 data produk palsu
        Produk::factory()->count(10)->create();
    }
}
