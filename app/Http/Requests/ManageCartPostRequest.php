<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ManageCartPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    protected function getValidatorInstance()
    {
        $data = $this->all();
        
        // Customer Data
        $customerData = [
            'email' => $data['cart']['email'],
        ];
        // Customer Data Exist
        $customerExist = [
            'bc_customer_id' => $data['cart']['customerId'],
        ];
        // Cart Data
        $cartData = [
            'name' => 'Cart - '.Str::random(5),
            'bc_cart_id' => $data['cart']['id'],
            'amount' => $data['cart']['cartAmount'],
        ];
        // Cart Item Data
        $cartItems = [];
        foreach ($data['cart']['lineItems']['physicalItems'] as $key => $value) {
            $cartItems[$key]['bc_line_item_id'] = $value['id'];
            $cartItems[$key]['parentId'] = $value['variantId'];
            $cartItems[$key]['variantId'] = $value['variantId'];
            $cartItems[$key]['productId'] = $value['productId'];
            $cartItems[$key]['sku'] = $value['sku'];
            $cartItems[$key]['name'] = $value['name'];
            $cartItems[$key]['url'] = $value['url'];
            $cartItems[$key]['quantity'] = $value['quantity'];
            $cartItems[$key]['brand'] = $value['brand'];
            $cartItems[$key]['listPrice'] = $value['listPrice'];
            $cartItems[$key]['salePrice'] = $value['salePrice'];
            $cartItems[$key]['extendedListPrice'] = $value['extendedListPrice'];
            $cartItems[$key]['extendedSalePrice'] = $value['extendedSalePrice'];
            $cartItems[$key]['type'] = $value['type'];
            $cartItems[$key]['imageUrl'] = $value['imageUrl'];
            $cartItems[$key]['isShippingRequired'] = $value['isShippingRequired'];
        }

        $data['customer_data'] = $customerData;
        $data['customer_exist'] = $customerExist;
        $data['cart'] = $cartData;
        $data['cart_item'] = $cartItems;

        $this->getInputSource()->replace($data);

        /*modify data before send to validator*/

        return parent::getValidatorInstance();
    }
}
