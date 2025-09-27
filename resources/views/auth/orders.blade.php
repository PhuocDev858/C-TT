@extends('layouts.client')

@section('title', 'Đơn Hàng Của Tôi - Kinh Doanh Xe Máy')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-shopping-bag"></i> Đơn Hàng Của Tôi
                    </h4>
                </div>
                <div class="card-body">
                    @if($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã Đơn</th>
                                        <th>Ngày Đặt</th>
                                        <th>Sản Phẩm</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td><strong>#{{ $order->id }}</strong></td>
                                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                @foreach($order->orderItems as $item)
                                                    <div class="mb-1">
                                                        {{ $item->product->name ?? 'Sản phẩm đã xóa' }} 
                                                        <small class="text-muted">(x{{ $item->quantity }})</small>
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                <strong class="text-primary">
                                                    {{ number_format($order->total_amount, 0, ',', '.') }} VNĐ
                                                </strong>
                                            </td>
                                            <td>
                                                @switch($order->status)
                                                    @case('pending')
                                                        <span class="badge bg-warning">Chờ xử lý</span>
                                                        @break
                                                    @case('processing')
                                                        <span class="badge bg-info">Đang xử lý</span>
                                                        @break
                                                    @case('shipped')
                                                        <span class="badge bg-primary">Đã giao</span>
                                                        @break
                                                    @case('delivered')
                                                        <span class="badge bg-success">Hoàn thành</span>
                                                        @break
                                                    @case('cancelled')
                                                        <span class="badge bg-danger">Đã hủy</span>
                                                        @break
                                                    @default
                                                        <span class="badge bg-secondary">{{ $order->status }}</span>
                                                @endswitch
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#orderModal{{ $order->id }}">
                                                    Chi tiết
                                                </button>
                                            </td>
                                        </tr>
                                        
                                        <!-- Order Detail Modal -->
                                        <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Chi tiết đơn hàng #{{ $order->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h6>Thông tin đơn hàng</h6>
                                                                <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                                                <p><strong>Trạng thái:</strong> 
                                                                    @switch($order->status)
                                                                        @case('pending') Chờ xử lý @break
                                                                        @case('processing') Đang xử lý @break
                                                                        @case('shipped') Đã giao @break
                                                                        @case('delivered') Hoàn thành @break
                                                                        @case('cancelled') Đã hủy @break
                                                                        @default {{ $order->status }}
                                                                    @endswitch
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h6>Chi tiết sản phẩm</h6>
                                                                @foreach($order->orderItems as $item)
                                                                    <div class="border-bottom py-2">
                                                                        <p class="mb-1"><strong>{{ $item->product->name ?? 'Sản phẩm đã xóa' }}</strong></p>
                                                                        <p class="mb-1">Số lượng: {{ $item->quantity }}</p>
                                                                        <p class="mb-0">Giá: {{ number_format($item->price, 0, ',', '.') }} VNĐ</p>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="text-end">
                                                            <h5>Tổng cong: <span class="text-primary">{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</span></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-shopping-bag fa-4x text-muted mb-3"></i>
                            <h5>Chưa có đơn hàng nào</h5>
                            <p class="text-muted">Hãy bắt đầu mua sắm để tạo đơn hàng đầu tiên của bạn!</p>
                            <a href="{{ route('products') }}" class="btn btn-primary">
                                <i class="fas fa-shopping-cart"></i> Mua sắm ngay
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection