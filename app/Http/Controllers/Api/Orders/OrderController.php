<?php

namespace App\Http\Controllers\Api\Orders;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway) {
        $token = $gateway->clientToken()->generate();
        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }

    public function makePayment(Request $request, Gateway $gateway) {
        return response()->json([
            'success' => true,
        ]);
    }
}
