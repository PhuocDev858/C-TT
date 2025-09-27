<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the client home page
     */
    public function index()
    {
        // Lấy một số sản phẩm nổi bật để hiển thị trên trang chủ
        $featuredProducts = Product::with(['category', 'brand'])
            ->latest()
            ->take(6)
            ->get();
            
        return view('client.home', compact('featuredProducts'));
    }
    
    /**
     * Display the products page
     */
    public function products(Request $request)
    {
        $query = Product::with(['category', 'brand']);
        
        // Lọc theo category nếu có
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
        
        // Lọc theo brand nếu có
        if ($request->has('brand') && $request->brand) {
            $query->where('brand_id', $request->brand);
        }
        
        // Tìm kiếm theo tên sản phẩm
        if ($request->has('search') && $request->search) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }
        
        $products = $query->paginate(12);
        $categories = Category::all();
        $brands = Brand::all();
        
        return view('client.product', compact('products', 'categories', 'brands'));
    }
    
    /**
     * Display a single product
     */
    public function show($id)
    {
        $product = Product::with(['category', 'brand'])->findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
            
        return view('client.product-detail', compact('product', 'relatedProducts'));
    }
}