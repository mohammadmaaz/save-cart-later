<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManageCartPostRequest;
use App\Http\Resources\CartResource;
use App\Services\SCL\Cart\CartServiceInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(Request $request, CartServiceInterface $cartService)
    {
        $this->request = $request;
        $this->cartService = $cartService;
    }

    public function manage(ManageCartPostRequest $manageCartPostRequest)
    {
        $data = $manageCartPostRequest->all();
        try {
            $cart = $this->cartService->manage($data);
            return response()->json(['success' => true, 'data' => $cart]);
        } catch (\Throwable$th) {
            throw $th;
        }
    }

    public function get(int $cartId)
    {
        try {
            $cart = $this->cartService->get($cartId,['items']);
            return new CartResource($cart);
        } catch (\Throwable$th) {
            throw $th;
        }
    }
}
