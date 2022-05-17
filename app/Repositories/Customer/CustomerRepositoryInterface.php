<?php

namespace App\Repositories\Customer;

interface CustomerRepositoryInterface
{
    public function createUpdate($exist,$data);
    public function carts(int $customerId, array $with=[]);
}