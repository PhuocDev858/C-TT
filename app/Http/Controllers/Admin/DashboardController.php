<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = \App\Models\Product::count();
        $customerCount = \App\Models\Customer::count();
        $orderCount = \App\Models\Order::count();
        $userCount = \App\Models\User::count();

        $latestOrders = \App\Models\Order::with('customer')->orderByDesc('created_at')->limit(5)->get();
        $latestProducts = \App\Models\Product::orderByDesc('created_at')->limit(5)->get();

        return view('admin.dashboard', compact(
            'productCount',
            'customerCount',
            'orderCount',
            'userCount',
            'latestOrders',
            'latestProducts'
        ));
    }
}
