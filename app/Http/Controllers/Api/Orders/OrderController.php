<?php

namespace App\Http\Controllers\Api\Orders;

use App\Models\Plate;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    protected $validations = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255|unique:orders',
        'address' => 'required|string|max:500|unique:orders',
        'phone' =>'required|string||max:20|unique:orders',
        'price_total' => 'required|numeric',
    ];

    public function createOrder(Request $request)
    {

        $request->validate($this->validations);

        $order_data = $request->all();

        $order = Order::create($order_data);

        return response()->json([
            'success' => true,
            'message' => 'Ordine avvenuto con successo',
        ]);
    }

















    // public function generate(Request $request, Gateway $gateway) {
    //     $token = $gateway->clientToken()->generate();

    //     $data = [
    //         'success' => true,
    //         'token' => $token
    //     ];

    //     return response()->json($data, 200);
    // }

    // public function makePayment(OrderRequest $request, Gateway $gateway) {

    //     $plate = Plate::find($request->plates);

    //     $result = $gateway->transaction()->sale([
    //         'amount' => $plate->price,
    //         'paymentMethodNonce' => $request->token,
    //         'options' => [
    //             'submitForSettlement' => true,
    //         ]
    //     ]);

    //     if($result->success) {
    //         $data = [
    //             'success' => true,
    //             'message' => 'Transazione avvenuta con successo'
    //         ];
    //         return response()->json($data, 200);

    //     } else {
    //         $data = [
    //             'success' => false,
    //             'message' => 'Transazione Fallita'
    //         ];
    //         return response()->json($data, 401);
    //     }
    // }
}
