<?php

namespace App\Services\SCL\Customer;


interface CustomerServiceInterface
{
    public function createUpdate($exist,$data);

    public function carts(int $customerId, array $with=[]);
}