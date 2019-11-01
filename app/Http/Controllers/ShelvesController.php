<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use Illuminate\Http\Request;

class ShelvesController extends Controller
{

    public function getShelvesHall($id)
    {
        $data = Rack::where('hall_id', $id)->get();

        $response = [
            'code' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function index()
    {
        $data = Rack::with('hall')
            ->with('hall.cellar')->get();

        $response = [
            'code' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function show($id)
    {
        $register = Rack::findOrFail($id);

        $response = [
            'code' => 200,
            'data' => $register
        ];

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $rules = [
            'code' => 'required|unique:shelves',
            'description' => 'required',
            'hall_id' => 'required|exists:hallways,id'
        ];

        $this->validate($request, $rules);
        $fields = $request->all();

        $register = Rack::create($fields);

        $response = [
            'code' => 201,
            'data' => $register
        ];

        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $register = Rack::findOrFail($id);

        $rules = [
            'code' => 'required|unique:shelves,code,' . $register->id,
            'description' => 'required',
            'hall_id' => 'required|exists:hallways,id'
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
        Rack::findOrFail($id)->delete();

        $response = [
            'code' => 200
        ];

        return response()->json($response);
    }
}
