<?php

namespace App\Repositories\Cart;

use App\Models\Customer;
use App\Repositories\Cart\CartRepositoryMysql;

class CartRepository implements CartRepositoryInterface
{
    public function __construct(CartRepositoryMysql $cartRepositoryMysql)
    {
        $this->cartRepositoryMysql = $cartRepositoryMysql;
    }
    public function create($data, Customer $customer)
    {
        return $this->cartRepositoryMysql->create($data, $customer);
    }
    public function get($cartId, array $with = [])
    {
        return $this->cartRepositoryMysql->get($cartId,$with);
    }
}
