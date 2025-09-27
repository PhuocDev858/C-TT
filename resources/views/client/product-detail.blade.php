@extends('layouts.client')

@section('title', $product->name . ' - Kinh Doanh Xe Máy')

@section('content')
    <div class="container py-5">
        <div class="row">
            <!-- Product Image -->
            <div class="col-md-6">
                @if($product->image)
                    <img src="{{ asset('storage/products/' . $product->image) }}" 
                         class="img-fluid rounded" 
                         alt="{{ $product->name }}"
                         style="width: 100%; max-height: 400px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/default-product.jpg') }}" 
                         class="img-fluid rounded" 
                         alt="{{ $product->name }}"
                         style="width: 100%; max-height: 400px; object-fit: cover;">
                @endif
            </div>
            
            <!-- Product Info -->
            <div class="col-md-6">
                <div class="product-details">
                    <h1 class="h2 mb-3">{{ $product->name }}</h1>
                    
                    <div class="price mb-3">
                        <h3 class="text-primary font-weight-bold">
                            {{ number_format($product->price, 0, ',', '.') }} VNĐ
                        </h3>
                    </div>
                    
                    <div class="product-meta mb-3">
                        <p><strong>Danh mục:</strong> {{ $product->category->name ?? 'Không phân loại' }}</p>
                        <p><strong>Thương hiệu:</strong> {{ $product->brand->name ?? 'Không có thương hiệu' }}</p>
                        <p><strong>Tình trạng:</strong> 
                            @if($product->stock > 0)
                                <span class="text-success">Còn hàng ({{ $product->stock }} xe)</span>
                            @else
                                <span class="text-danger">Hết hàng</span>
                            @endif
                        </p>
                    </div>
                    
                    <div class="product-description mb-4">
                        <h5>Mô tả sản phẩm:</h5>
                        <p>{{ $product->description }}</p>
                    </div>
                    
                    <div class="product-actions">
                        @if($product->stock > 0)
                            <button class="btn btn-primary btn-lg mr-2">
                                <i class="fa fa-shopping-cart"></i> Liên hệ mua hàng
                            </button>
                        @else
                            <button class="btn btn-secondary btn-lg" disabled>
                                Hết hàng
                            </button>
                        @endif
                        <a href="{{ route('products') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fa fa-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mb-4">Sản phẩm liên quan</h3>
                </div>
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            @if($relatedProduct->image)
                                <img src="{{ asset('storage/products/' . $relatedProduct->image) }}" 
                                     class="card-img-top" 
                                     alt="{{ $relatedProduct->name }}"
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default-product.jpg') }}" 
                                     class="card-img-top" 
                                     alt="{{ $relatedProduct->name }}"
                                     style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                <p class="card-text flex-grow-1">{{ Str::limit($relatedProduct->description, 60) }}</p>
                                <p class="text-primary font-weight-bold">
                                    {{ number_format($relatedProduct->price, 0, ',', '.') }} VNĐ
                                </p>
                                <a href="{{ route('product.show', $relatedProduct->id) }}" class="btn btn-outline-primary btn-sm">
                                    Xem sản phẩm
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection