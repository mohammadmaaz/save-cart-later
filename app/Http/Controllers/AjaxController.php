<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequest()
    {
        $json = '{"cart":{"id":"fe8cd0e9-d72a-43d1-8e2a-72af0a3e717c","customerId":1,"email":"muhammadmaaz@folio3.com","currency":{"name":"Pakistan Rupee","code":"PKR","symbol":"₨","decimalPlaces":2},"isTaxIncluded":false,"baseAmount":34.95,"discountAmount":0,"cartAmount":34.95,"coupons":[],"discounts":[{"id":"73ed9910-3ffc-492e-8146-9ab2c2a3bb11","discountedAmount":0}],"lineItems":{"physicalItems":[{"id":"73ed9910-3ffc-492e-8146-9ab2c2a3bb11","parentId":null,"variantId":68,"productId":94,"sku":"OCG","name":"[Sample] Oak Cheese Grater","url":"https://watch-maker.mybigcommerce.com/oak-cheese-grater/","quantity":1,"brand":"Sagaform","isTaxable":true,"imageUrl":"https://cdn11.bigcommerce.com/s-l1s2qbgne3/products/94/images/314/oakcheesegrater2.1641570391.220.290.jpg?c=1","discounts":[],"discountAmount":0,"couponAmount":0,"listPrice":34.95,"salePrice":34.95,"extendedListPrice":34.95,"extendedSalePrice":34.95,"isShippingRequired":true,"type":"physical","isMutable":true,"giftWrapping":null}],"digitalItems":[],"giftCertificates":[],"customItems":[]},"createdTime":"2022-01-24T07:12:43+00:00","updatedTime":"2022-01-24T09:22:55+00:00","locale":"en"}}';
        $data = json_decode($json, true);
        dd($data);
        // $customerData = [
        //     'customerId' => $data['cart']['customerId'],
        //     'email' => $data['cart']['email'],
        // ];
        // dd($data);
        // echo '<h5>Customer Data</h5>';
        // print_r($customerData);
        // print_r($data['cart']['lineItems']['physicalItems']);
        // $cartItems = [];
        // foreach ($data['cart']['lineItems']['physicalItems'] as $key => $value) {
        //     $cartItems[$key]['lineItemId'] = $value['id'];
        //     $cartItems[$key]['variantId'] = $value['variantId'];
        //     $cartItems[$key]['productId'] = $value['productId'];
        //     $cartItems[$key]['sku'] = $value['sku'];
        //     $cartItems[$key]['name'] = $value['name'];
        //     $cartItems[$key]['quantity'] = $value['quantity'];
        //     $cartItems[$key]['listPrice'] = $value['listPrice'];
        //     $cartItems[$key]['salePrice'] = $value['salePrice'];
        //     $cartItems[$key]['type'] = $value['type'];
        // }
        // echo '<h5>Cart Item Data</h5>';
        // print_r($cartItems);
        $saveCartLater = [[
            'cart_name' => 'Cart One',
            'total_item' => 1,
        ], [
            'cart_name' => 'Cart Two',
            'total_item' => 3,
        ]];
        return response()->json($saveCartLater);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();
        Log::info($input);
        return response()->json(['success' => 'Got Simple Ajax Request.']);
    }
}
