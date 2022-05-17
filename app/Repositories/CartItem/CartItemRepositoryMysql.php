<?php

namespace App\Repositories\CartItem;

use App\Models\Cart;
use App\Models\CartItem;

class CartItemRepositoryMysql implements CartItemRepositoryInterface
{
    public function __construct(CartItem $cartItem) {
        $this->cartItem = $cartItem;
    }
    public function create($data,Cart $cart){
        return $cart->items()->createMany($data);
    }
}