<?php

namespace App\Repositories\CartItem;

use App\Models\Cart;
use App\Repositories\CartItem\CartItemRepositoryMysql;

class CartItemRepository implements CartItemRepositoryInterface
{
    public function __construct(CartItemRepositoryMysql $cartItemRepositoryMysql) {
        $this->cartItemRepositoryMysql = $cartItemRepositoryMysql;
    }
    public function create($data, Cart $cart){
        return $this->cartItemRepositoryMysql->create($data,$cart);
    }
}