<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request) {

        $orderIds = explode(",", $request->ids);
        $products = Product::findMany($orderIds);

        return response($products, 200);
    }
}
