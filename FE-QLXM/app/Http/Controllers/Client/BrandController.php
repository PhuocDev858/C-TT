<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $apiUrl = config('app.be_api_url', 'http://127.0.0.1:8000');
        $page = $request->query('page', 1);
        $response = \Illuminate\Support\Facades\Http::get($apiUrl . '/api/client/brands', [
            'page' => $page
        ]);
        $responseData = $response->json();
        $brands = $responseData['data'] ?? [];
        $paginationLinks = $responseData['links'] ?? [];
        return view('client.brands.index', compact('brands', 'paginationLinks'));
    }

    public function show($id, Request $request)
    {
        $apiUrl = config('app.be_api_url', 'http://127.0.0.1:8000');
        $page = $request->query('page', 1);
        $brandResponse = \Illuminate\Support\Facades\Http::get($apiUrl . "/api/client/brands/{$id}");
        $brand = $brandResponse->json() ?? [];
        $productsResponse = \Illuminate\Support\Facades\Http::get($apiUrl . "/api/client/products", [
            'brand_id' => $id,
            'page' => $page
        ]);
        $productsData = $productsResponse->json();
        $products = $productsData['data'] ?? [];
        $paginationLinks = $productsData['links'] ?? [];
        return view('client.brand-detail', compact('brand', 'products', 'paginationLinks'));
    }
}
