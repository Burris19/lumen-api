<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallwaysController extends Controller
{

    public function index()
    {
        $data = Hall::with('cellar')->get();

        $response = [
            'code' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function show($id)
    {
        $register = Hall::findOrFail($id);

        $response = [
            'code' => 200,
            'data' => $register
        ];

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $rules = [
            'code' => 'required|unique:hallways',
            'description' => 'required',
            'cellar_id' => 'required|exists:wineries,id'
        ];

        $this->validate($request, $rules);
        $fields = $request->all();

        $register = Hall::create($fields);

        $response = [
            'code' => 201,
            'data' => $register
        ];

        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $register = Hall::findOrFail($id);

        $rules = [
            'code' => 'required|unique:hallways,code,' . $register->id,
            'description' => 'required',
            'cellar_id' => 'required|exists:wineries,id'
        ];

        $this->validate($request, $rules);

        $register->update($request->all());

        $response = [
            'code' => 200,
            'data' => $register
        ];

        return response()->json($response);
    }

    public function delete($id)
    {
        Hall::findOrFail($id)->delete();

        $response = [
            'code' => 200
        ];

        return response()->json($response);
    }
}
