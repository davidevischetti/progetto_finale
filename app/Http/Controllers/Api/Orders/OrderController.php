<?php

namespace App\Http\Controllers\Api\Orders;

use App\Models\Plate;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Order;
use OrderSeeder;

class OrderController extends Controller
{
    protected $validations = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255|unique:orders',
        'address' => 'required|string|max:500|unique:orders',
        'phone' =>'required|string||max:20|unique:orders',
    ];

    public function generate(Request $request, Gateway $gateway) {
        
        $token = $gateway->clientToken()->generate();

        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }

    public function makePayment(Request $request, Gateway $gateway) {


        $dataOrderback = $request->all();

        $plateIds = $dataOrderback['plate'];

        $token = $dataOrderback['token'];

        $infoOrder = $dataOrderback['order'];

        
        
        
        
        $priceTotal = null;
        foreach($plateIds as $id ){

            $plate = Plate::find($id);
            $priceTotal += $plate->price;
        }

        

        // return response()->json([
        //     'success' => true,
        //     'priceTotal' => $infoOrder,
        // ]);

        $result = $gateway->transaction()->sale([
            'amount' => $priceTotal,
            'paymentMethodNonce' => $token,
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if($result->success) {

            

            Order::create($infoOrder + [
                'price_total' => $priceTotal
            ]);


            return response()->json([
                'success' => true,
                'message' => 'Transazione avvenuta con successo'
            ]);

        } else {

            return response()->json([
                'success' => false,
                'message' => 'Transazione Fallita'
            ]);
        }


            
            
    }
}
