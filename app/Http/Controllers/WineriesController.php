<?php

namespace App\Http\Controllers;

use App\Models\Cellar;
use Illuminate\Http\Request;

class WineriesController extends Controller
{

    public function index()
    {
        $data = Cellar::all();

        $response = [
            'code' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function show($id)
    {
        $register = Cellar::findOrFail($id);

        $response = [
            'code' => 200,
            'data' => $register
        ];

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $rules = [
            'code' => 'required|unique:wineries',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];

        $this->validate($request, $rules);
        $fields = $request->all();

        $register = Cellar::create($fields);

        $response = [
            'code' => 201,
            'data' => $register
        ];

        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $register = Cellar::findOrFail($id);

        $rules = [
            'code' => 'required|unique:wineries,code,' . $register->id,
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];

        $this->validate($request, $rules);

        $register->update($request->all());

        $response = [
            'code' => 200,
            'message' => 'Update Successfully',
            'data' => $register
        ];

        return response()->json($response);
    }

    public function delete($id)
    {
        Cellar::findOrFail($id)->delete();

        $response = [
            'code' => 200
        ];

        return response()->json($response);
    }
}
