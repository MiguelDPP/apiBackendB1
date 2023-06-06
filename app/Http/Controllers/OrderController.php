<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\student;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        //
        $orders = order::all();
        return $orders; 
    }

    public function getOrder(Request $request)
    {
        //
        $order = order::where('id', $request->id)->first();
        
        if($order){
            return response()->json([
                'message' => 'Order found',
                'order' => $order
            ], 200);
        }else{
            return response()->json([
                'message' => 'Order not found',
            ], 404);
        }
        
    }

    public function createOrder(Request $request)
    {
        $client = student::where('identification', $request->client_id)->first();

        if ($client) {
            $request->merge([
                'client_id' => $client->id,
            ]);
        } else {
            $client = student::create([
                'identification' => $request->client_id,
                'name' => $request->name,
                'type' => $request->type,
            ]);

            $request->merge([
                'client_id' => $client->id,
            ]);
        }


        //
        $order = order::create([
            'client' => $request->client_id,
            'food' => $request->food,
            'amount' => $request->amount,
            'price' => $request->price,
            'is_paid' => $request->is_paid,
            'date' => $request->date,
        ]);

        $order->load('client', 'food');
        
        if($order){
            return response()->json([
                'message' => 'Order created',
                'order' => $order
            ], 200);
        }else{
            return response()->json([
                'message' => 'Order not created',
            ], 404);
        }
        
    }

    public function getOrdersByClient(Request $request)
    {
        $client = student::where('identification', $request->identification)->first();

        if($client){
            $orders = order::where('client', $client->id)->get();

            $orders->load('client', 'food');
            return response()->json([
                'message' => 'Orders found',
                'orders' => $orders
            ], 200);
        }else{
            return response()->json([
                'message' => 'Client not found',
            ], 404);
        }
    }
}