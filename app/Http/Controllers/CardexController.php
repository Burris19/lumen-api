<?php

namespace App\Http\Controllers;

use App\Models\Cardex;
use App\Models\Product;
use App\Models\Cellar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CardexController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'action' => 'required|in:ENTRADA,SALIDA',
            'cellar_to_id' => 'required|exists:wineries,id',
            'type' => 'required',
            'cellar_from_id' => 'exists:wineries,id',
            'products' => 'required'
        ];

        $this->validate($request, $rules);

        //obtener todos los campos en filds
        $fields = $request->all();

        //Establecer la fecha de la transaccion
        $fields['date_transaction'] = Carbon::now();

        //Obtener los productos
        $products = $request->products;

        if ($request->action == 'ENTRADA' && $request->type != 'BODEGA') {
            foreach ($products as $key => $product) {
                $newProduct = Product::create($product);
                $products[$key]['id'] = $newProduct->id;
            }
        }

        // Recorrer los productos, buscar el producto por su id  y luego eliminarlo
        if ($request->action == 'SALIDA' && $request->type != 'BODEGA') {
            foreach ($products as $key => $idProduct) {
                Product::findOrFail($idProduct)->delete();
            }
        }

        if ($request->type == 'BODEGA') {
            foreach ($products as $key => $idProduct) {
                Product::where('id', $idProduct)->update(['rack_id' => $fields['rack_id']]);
            }
        }

        //Registrar la transaccion en la tabla de cardex
        foreach ($products as $key => $idProduct) {
            $newRegister['action'] = $fields['action'];
            $newRegister['type'] = $fields['type'];
            $newRegister['date_transaction'] = $fields['date_transaction'];
            $newRegister['cellar_to_id'] = $fields['cellar_to_id'];
            if ($request->has('cellar_from_id')) {
                $newRegister['cellar_from_id'] = $fields['cellar_from_id'];
            }
            $newRegister['product_id'] = $idProduct;
            Cardex::create($newRegister);
        }

        $response = [
            'code' => 201
        ];

        return response()->json($response);
        return response()->json($response);
    }
}
