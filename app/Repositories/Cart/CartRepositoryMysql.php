<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Customer;

class CartRepositoryMysql implements CartRepositoryInterface
{
    /**
     * @var Cart
     */
    private $cart;

    /**
     * __construct
     *
     * @param  mixed $cart
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    /**
     * create
     *
     * @param  mixed $data
     * @param  mixed $customer
     * @return void
     */
    public function create($data, Customer $customer)
    {
        return $customer->carts()->create($data);
    }

    /**
     * get
     *
     * @param  mixed $cartId
     * @return void
     */
    public function get($cartId, array $with = [])
    {
        $cart = $this->cart->findOrFail($cartId);
        if (0 < count($with)) {
            $cart = $cart->load($with);
        }

        return $cart;
    }
}
