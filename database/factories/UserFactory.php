<?php

// database/factories/UserFactory.php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // pastikan password yang di-hash
            'role' => 'user', // Menambahkan role, Anda bisa menggunakan `admin` atau `user` secara acak sesuai kebutuhan
        ];
    }
}
