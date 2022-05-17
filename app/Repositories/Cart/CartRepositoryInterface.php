<?php

namespace App\Repositories\Cart;

use App\Models\Customer;

interface CartRepositoryInterface
{
    public function create($data,Customer $customer);
    public function get($cartId, array $with = []);
}