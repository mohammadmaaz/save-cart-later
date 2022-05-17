<?php

namespace App\Services\SCL\Customer;

use App\Models\Customer;
use App\Repositories\Customer\CustomerRepository;

class CustomerService implements CustomerServiceInterface
{
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    public function createUpdate($exist,$data)
    {
        $this->customerRepository->createUpdate($exist,$data);
    }

    public function carts(int $customerId, array $with=[])
    {
        return $this->customerRepository->carts($customerId,$with);
    }
}
