<?php

namespace App\Services\SCL\Cart;

use App\Repositories\CartItem\CartItemRepositoryInterface;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\Customer\CustomerRepositoryInterface;

class CartService implements CartServiceInterface
{
    public function __construct(CustomerRepositoryInterface $customerRepository, CartRepositoryInterface $cartRepository, CartItemRepositoryInterface $cartItemRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->customerRepository = $customerRepository;
        $this->cartItemRepository = $cartItemRepository;
    }

    public function manage($data)
    {
        $customer = $this->customerRepository->createUpdate($data['customer_exist'], $data['customer_data']);
        $cart = $this->cartRepository->create($data['cart'], $customer);
        $cartItem = $this->cartItemRepository->create($data['cart_item'], $cart);
        return $cart;
    }

    public function get($cartId, array $with = [])
    {
        return $this->cartRepository->get($cartId, $with);
    }

}
