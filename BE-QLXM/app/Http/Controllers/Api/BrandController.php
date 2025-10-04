<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        return Brand::latest()->paginate(5);
    }

    public function store(BrandRequest $request)
    {
        $brand = Brand::create($request->validated());
        return response()->json($brand, 201);
    }

    public function show($id)
    {
        return Brand::findOrFail($id);
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->update($request->validated());
        return $brand;
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
