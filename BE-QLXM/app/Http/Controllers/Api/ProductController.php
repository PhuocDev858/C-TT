<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = Product::with(['brand', 'category']);

        if ($request->filled('brand_id')) $q->where('brand_id', $request->brand_id);
        if ($request->filled('category_id')) $q->where('category_id', $request->category_id);
        if ($request->filled('status')) $q->where('status', $request->status);
        if ($request->filled('search')) $q->where('name', 'like', '%' . $request->search . '%');

        return $q->latest()->paginate(20);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
        $product = Product::create($data)->load(['brand', 'category']);
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::with(['brand', 'category'])->findOrFail($id);
        return $product;
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        return $product->load(['brand', 'category']);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
