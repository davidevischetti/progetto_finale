<?php

namespace App\Http\Controllers\Api\Orders;

use App\Models\Plate;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway) {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway) {

        $plate = Plate::find($request->plates);

        $result = $gateway->transaction()->sale([
            'amount' => $plate->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if($result->success) {
            $data = [
                'success' => true,
                'message' => 'Transazione avvenuta con successo'
            ];
            return response()->json($data, 200);

        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione Fallita'
            ];
            return response()->json($data, 401);
        }
    }
}