@extends('layouts.client')

@section('title', 'Trang Chủ - Kinh Doanh Xe Máy')

@section('content')
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <!-- Banner 1 -->
            <div class="banner-item-01">
                <img src="{{ asset('images/slide_01.jpg') }}" alt="Khuyến mãi đặc biệt" style="width:100%;height:auto;">
                <div class="text-content">
                    <h4>Khuyến mãi đặc biệt</h4>
                    <h2>Xe mới về giá tốt</h2>
                    <a href="#" class="btn btn-primary">Xem ngay</a>
                </div>
            </div>
            <!-- Banner 2 -->
            <div class="banner-item-02">
                <img src="{{ asset('images/slide_02.jpg') }}" alt="Thương hiệu uy tín" style="width:100%;height:auto;">
                <div class="text-content">
                    <h4>Thương hiệu uy tín</h4>
                    <h2>Chọn xe phù hợp</h2>
                    <a href="#" class="btn btn-success">Khám phá</a>
                </div>
            </div>
            <!-- Banner 3 -->
            <div class="banner-item-03">
                <img src="{{ asset('images/slide_03.jpg') }}" alt="Ưu đãi cuối tháng" style="width:100%;height:auto;">
                <div class="text-content">
                    <h4>Ưu đãi cuối tháng</h4>
                    <h2>Đừng bỏ lỡ cơ hội</h2>
                    <a href="#" class="btn btn-warning">Nhận ưu đãi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <!-- Latest Products -->
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Sản Phẩm Mới Nhất</h2>
                        <a href="{{ route('products') }}">xem tất cả sản phẩm <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @if(isset($featuredProducts) && $featuredProducts->count() > 0)
                    @foreach($featuredProducts as $product)
                        <div class="col-md-4">
                            <div class="product-item">
                                <a href="{{ route('product.show', $product->id) }}">
                                    @if($product->image)
                                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('images/default-product.jpg') }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                                <div class="down-content">
                                    <a href="{{ route('product.show', $product->id) }}">
                                        <h4>{{ $product->name }}</h4>
                                    </a>
                                    <h6>{{ number_format($product->price, 0, ',', '.') }} VNĐ</h6>
                                    <p>{{ Str::limit($product->description, 80) }}</p>
                                    <small class="text-muted">
                                        {{ $product->category->name ?? 'Không phân loại' }} | 
                                        {{ $product->brand->name ?? 'Không có thương hiệu' }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <h5>Chưa có sản phẩm nào</h5>
                            <p>Hãy thêm sản phẩm từ trang quản trị để hiển thị ở đây.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>About Sixteen Clothing</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4>Looking for the best products?</h4>
                        <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing"
                                target="_parent">This template</a> is free to use for your business websites. However,
                            you have no permission to redistribute the downloadable ZIP file on any template collection
                            website. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more
                            info.</p>
                        <ul class="featured-list">
                            <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                            <li><a href="#">Consectetur an adipisicing elit</a></li>
                            <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                            <li><a href="#">Corporis, omnis doloremque</a></li>
                            <li><a href="#">Non cum id reprehenderit</a></li>
                        </ul>
                        <a href="about.html" class="filled-button">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="asset/images/feature-image.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                    author nulla.</p>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="filled-button">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


@endsection
