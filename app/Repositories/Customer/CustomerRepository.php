<?php

namespace App\Repositories\Customer;

use App\Repositories\Customer\CustomerRepositoryMysql;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function __construct(CustomerRepositoryMysql $customerRepositoryMysql) {
        $this->customerRepositoryMysql = $customerRepositoryMysql;
    }
    public function createUpdate($exist,$data){
        return $this->customerRepositoryMysql->createUpdate($exist,$data);
    }

    public function carts(int $customerId,array $with=[])
    {
        return $this->customerRepositoryMysql->carts($customerId,$with);
    }
}