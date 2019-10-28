<?php

namespace App\Http\Controllers;

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
}
