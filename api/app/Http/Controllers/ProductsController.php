<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsCollection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    public function index(): Response
    {
        return response(Product::all(), 200);
    }

    public function store(Request $request): Response
    {

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'images' => json_encode(json_decode($request->images)),
            'stock' => $request->stock,
            'specifications' => json_encode(json_decode($request->specifications)),
            'basePrice' => $request->basePrice,
            'discountPercent' => $request->discountPercent,
            'manufacturer' => $request->manufacturer
        ]);

        return response($product, 200);
    }

    public function show($id): Response
    {
        $product = Product::findOrFail($id);

        return response(new ProductsCollection(($product)), 200);

    }

    public function update(Request $request, $id): Response
    {
        $product = Product::findOrFail($id);

        $product = Product::update([
            'name' => $request->name,
            'description' => $request->description,
            'images' => json_encode(json_decode($request->images)),
            'stock' => $request->stock,
            'specifications' => json_encode(json_decode($request->specifications)),
            'basePrice' => $request->basePrice,
            'discountPercent' => $request->discountPercent,
            'manufacturer' => $request->manufacturer
        ]);
        $product->save();

        return response($product, 200);
    }

    public function destroy($id): Response
    {
        $product = Product::findOrFail($id);
        return response($product->delete(), 200);
    }
}
