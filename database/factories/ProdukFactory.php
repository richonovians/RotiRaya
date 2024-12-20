<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * Nama model yang terkait dengan factory.
     *
     * @var string
     */
    protected $model = Produk::class;

    /**
     * Definisikan model untuk produk.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_produk' => $this->faker->word(),
            'deskripsi' => $this->faker->sentence(),
            'harga' => $this->faker->numberBetween(1000, 100000),
            'stok' => $this->faker->numberBetween(1, 100),
            'foto' => $this->faker->imageUrl(640, 480, 'products'), // Menambahkan gambar palsu
        ];
    }
}
