<?php

namespace App\Policies;

use App\Models\Produk; 
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function update(User $user, Produk $product) {
        return $user->is_admin;
    }
}
