<?php

namespace App\Services\SCL\Cart;

interface CartServiceInterface
{
    public function manage($data);
    public function get($cartId, array $with = []);
}