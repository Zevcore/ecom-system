<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrdersCollection;
use App\Lib\Cart\Cart;
use App\Lib\Status\Statuses;
use App\Models\Order;
use Illuminate\Http\Response;

class OrdersController extends Controller
{

    public function index(): Response
    {
        return response(Order::all(), 200);
    }

    public function store(StoreOrderRequest $request): Response
    {
        $requestCart = json_decode($request->cart);
        $cart = new Cart($requestCart->total, (array) $requestCart->items);

        if($request->validated()) {
            $order = Order::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'address' => $request->address,
                'email' => $request->email,
                'status' => Statuses::STATUS_CREATED,
                'cart' => json_encode($cart->show()),
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
        $requestCart = json_decode($request->cart);
        $cart = new Cart($requestCart->total, (array) $requestCart->items);

        if($request->validated()) {
            $order = Order::findOrFail($id);

            $order->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'address' => $request->address,
                'email' => $request->email,
                'status' => Statuses::STATUS_UPDATED,
                'cart' => json_encode($cart->show()),
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
