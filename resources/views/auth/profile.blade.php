@extends('layouts.client')

@section('title', 'Hồ Sơ Cá Nhân - Kinh Doanh Xe Máy')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-user"></i> Hồ Sơ Cá Nhân
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Thông tin tài khoản</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Họ và tên:</strong></td>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Ngày đăng ký:</strong></td>
                                    <td>{{ Auth::user()->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Thống kê</h5>
                            <div class="bg-light p-3 rounded">
                                <p class="mb-1">
                                    <i class="fas fa-shopping-bag text-primary"></i>
                                    <strong>Tổng đơn hàng:</strong> {{ Auth::user()->orders()->count() }}
                                </p>
                                <p class="mb-0">
                                    <i class="fas fa-clock text-warning"></i>
                                    <strong>Lần đăng nhập cuối:</strong> {{ Auth::user()->updated_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="text-center">
                        <a href="{{ route('orders') }}" class="btn btn-primary me-2">
                            <i class="fas fa-shopping-bag"></i> Xem Đơn Hàng
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-home"></i> Về Trang Chủ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection