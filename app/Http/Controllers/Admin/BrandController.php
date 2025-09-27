<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Danh sách brands
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    // Form thêm mới
    public function create()
    {
        return view('admin.brands.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
        ]);

        Brand::create([
            'name' => $request->name,
            'country' => $request->country,
        ]);

        // Sau khi thêm xong thì quay lại trang danh sách
        return redirect()->route('admin.brands.index')->with('success', 'Thêm thương hiệu thành công');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $request->validate([
            'name' => 'required|max:100|unique:brands,name,' . $id,
            'country' => 'nullable|max:100',
        ]);
        $brand->update($request->only('name', 'country'));
        return redirect()->route('admin.brands.index')->with('success', 'Cập nhật thương hiệu thành công');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Xóa thương hiệu thành công!');
    }
}
