<?php

namespace App\Http\Controllers;

use App\Models\Cellar;
use App\Models\Product;
use Illuminate\Http\Request;

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


    public function productsWithRelationship()
    {
        $data = Product::with('rack')
            ->with('rack.hall')
            ->with('rack.hall')
            ->with('rack.hall.cellar')
            ->get();

        $response = [
            'code' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function searchProduct(Request $request)
    {
        $rules = [
            'search' => 'required'
        ];

        $this->validate($request, $rules);

        $products  = Product::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('code', 'like', '%' . $request->search . '%')
            ->with('rack.hall')
            ->with('rack.hall')
            ->with('rack.hall.cellar')
            ->get();

        $response = [
            'code' => 200,
            'data' => $products
        ];

        return response()->json($response);
    }
}
