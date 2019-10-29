<?php

namespace App\Http\Controllers;

use App\Models\Cellar;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $data = Product::all();

        $response = [
            'code' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function productsByCellar($id)
    {
        $data = Cellar::where('id', $id)
            ->with('hallways')
            ->with('hallways.shelves')
            ->with('hallways.shelves.products')
            ->get()
            ->pluck('hallways')
            ->collapse()
            ->pluck('shelves')
            ->collapse()
            ->pluck('products')
            ->collapse()
            ->values();

        $response = [
            'code' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }
}
