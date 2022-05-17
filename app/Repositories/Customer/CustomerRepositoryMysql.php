<?php

namespace App\Repositories\Customer;

use App\Models\Customer;

class CustomerRepositoryMysql implements CustomerRepositoryInterface
{
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    public function createUpdate($exist, $data)
    {
        return $this->customer->updateOrCreate($exist, $data);
    }

    public function carts($customerId, array $with = [])
    {
        $customer = $this->customer->findOrFail($customerId);
        $carts = $customer->carts;

        if (0 < count($with)) {
            $carts->load($with);
        }
        return $carts;
    }
}
