@extends('layouts.client')

@section('title', 'Hãng Xe Máy - QLXM')
@section('description', 'Xem danh sách các hãng xe máy uy tín như Honda, Yamaha, Suzuki tại QLXM')

@section('content')
    <!-- Page Heading -->
    <div class="page-heading products-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>thương hiệu uy tín</h4>
                        <h2>hãng xe máy</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands Section -->
    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Các Hãng Xe Máy Hàng Đầu</h2>
                    </div>
                </div>

                @if (isset($error))
                    <div class="col-md-12">
                        <div class="alert alert-warning text-center">
                            <h4>{{ $error }}</h4>
                            <p>Vui lòng thử lại sau hoặc liên hệ quản trị viên.</p>
                        </div>
                    </div>
                @endif
                
                @if (count($brands) > 0)
                    @foreach ($brands as $brand)
                        <div class="col-md-4 mb-4">
                            <div class="team-member">
                                <div class="thumb-container">
                                    @if (isset($brand['logo']) && $brand['logo'])
                                        <img src="{{ config('app.be_api_url') }}/storage/{{ $brand['logo'] }}" alt="{{ $brand['name'] }}">
                                    @else
                                        <img src="{{ asset('img/team_0' . (($loop->index % 3) + 1) . '.jpg') }}" alt="{{ $brand['name'] }}">
                                    @endif
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <a href="{{ route('client.brands.show', $brand['id']) }}" class="filled-button">Xem Xe {{ $brand['name'] }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="down-content">
                                    <h4>{{ $brand['name'] }}</h4>
                                    @if (isset($brand['country']))
                                        <span>{{ $brand['country'] }}</span>
                                    @endif
                                    @if (isset($brand['description']))
                                        <p>{{ Str::limit($brand['description'], 100) }}</p>
                                    @else
                                        <p>Thương hiệu xe máy uy tín với chất lượng cao và công nghệ tiên tiến.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="text-center py-5">
                            <h4>Không có thông tin hãng xe</h4>
                            <p>Hiện tại chưa có thông tin về các hãng xe máy.</p>
                            <a href="{{ route('client.motorcycles') }}" class="btn btn-primary">
                                Xem Tất Cả Xe Máy
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @include('components.pagination')

    <!-- Brand Comparison -->
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>So Sánh Các Hãng Xe</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-gear"></i>
                        </div>
                        <div class="down-content">
                            <h4>Honda - Tiết Kiệm</h4>
                            <p>Xe Honda nổi tiếng với độ bền cao, tiết kiệm nhiên liệu và giá phụ tùng hợp lý.</p>
                            <a href="#" class="filled-button">Tìm Hiểu</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-gear"></i>
                        </div>
                        <div class="down-content">
                            <h4>Yamaha - Thể Thao</h4>
                            <p>Yamaha chuyên về xe thể thao với thiết kế năng động và hiệu suất cao.</p>
                            <a href="#" class="filled-button">Chi Tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-gear"></i>
                        </div>
                        <div class="down-content">
                            <h4>Suzuki - Mạnh Mẽ</h4>
                            <p>Suzuki tập trung vào động cơ mạnh mẽ và thiết kế thể thao ấn tượng.</p>
                            <a href="#" class="filled-button">Xem Thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
