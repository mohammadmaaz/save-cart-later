<?php

namespace App\Repositories\CartItem;

use App\Models\Cart;

interface CartItemRepositoryInterface
{
    public function create($data,Cart $cart);
}