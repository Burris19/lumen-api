<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $data = Category::all();

        $response = [
            'code' => 200,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function show($id)
    {
        $register = Category::findOrFail($id);

        $response = [
            'code' => 200,
            'data' => $register
        ];

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories'
        ];

        $this->validate($request, $rules);
        $fields = $request->all();

        $register = Category::create($fields);

        $response = [
            'code' => 201,
            'data' => $register
        ];

        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $register = Category::findOrFail($id);

        $rules = [
            'name' => 'required|unique:categories,name,' . $register->id,
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
        Category::findOrFail($id)->delete();

        $response = [
            'code' => 200
        ];

        return response()->json($response);
    }
}
