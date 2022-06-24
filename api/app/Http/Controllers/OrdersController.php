<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrdersCollection;
use App\Models\Order;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(): Response
    {
        return response(Order::all(), 200);
    }

    public function store(StoreOrderRequest $request): Response
    {
        if($request->validated()) {
            $order = Order::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'address' => $request->address,
                'email' => $request->email,
                'status' => "EXPORTED",
                'cart' => json_encode(json_decode($request->cart)),
                'value' => $request->value,
            ]);

            return response($order, 200);
        }
        return response("Validation error", 400);
    }

    public function show($id): Response
    {
        $order = Order::findOrFail($id);

        return response(new OrdersCollection(($order)), 200);

    }

    public function update(StoreOrderRequest $request, $id): Response
    {
        if($request->validated()) {
            $order = Order::findOrFail($id);
            $order->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'address' => $request->address,
                'email' => $request->email,
                'status' => "EXPORTED",
                'cart' => json_encode(json_decode($request->cart)),
                'value' => $request->value,
            ]);

            $order->save();

            return response($order, 200);
        }

        return response("Validation error", 400);
    }

    public function destroy($id): Response
    {
        $order = Order::findOrFail($id);
        return response($order->delete(), 200);
    }
}
