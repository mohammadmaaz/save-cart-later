<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Services\SCL\Customer\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomerCartController extends Controller
{
    public function __construct(Request $request, CustomerServiceInterface $customerService)
    {
        $this->request = $request;
        $this->customerService = $customerService;
    }

    public function get(int $customerId)
    {
        $carts = $this->customerService->carts($customerId,['items']);
        return CartResource::collection($carts);
    }
}
