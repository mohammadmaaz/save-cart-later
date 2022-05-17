<?php

namespace App\Services\SCL\CartItem;
use App\Repositories\CartItem\CartItemRepository;

class CartItemService implements CartItemServiceInterface
{
    public function __construct(CartItemRepository $cartItemRepository) {
        $this->cartItemRepository = $cartItemRepository;
    }
    public function create($data){
        $this->cartItemRepository->create($data);
    }
}