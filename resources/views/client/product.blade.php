@extends('layouts.client')

@section('title', 'Sản Phẩm - Kinh Doanh Xe Máy')

@section('extra-css')
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Products Grid -->
    <main class="products py-5">
        <div class="container">
            <!-- Filter Section -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <form method="GET" action="{{ route('products') }}" class="row">
                        <div class="col-md-3">
                            <select name="category" class="form-control">
                                <option value="">Tất cả danh mục</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="brand" class="form-control">
                                <option value="">Tất cả thương hiệu</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Products -->
            <div class="row justify-content-center">
                @if($products->count() > 0)
                    @foreach($products as $product)
                        <div class="col-md-3 d-flex align-items-stretch mb-4">
                            <div class="card h-100 border-primary">
                                @if($product->image)
                                    <img src="{{ asset('storage/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default-product.jpg') }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body text-center d-flex flex-column">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text flex-grow-1">{{ Str::limit($product->description, 60) }}</p>
                                    <p class="text-primary font-weight-bold mb-2" style="font-size: 1.2rem;">
                                        {{ number_format($product->price, 0, ',', '.') }} VNĐ
                                    </p>
                                    <small class="text-muted mb-2">
                                        {{ $product->category->name ?? 'Không phân loại' }} | 
                                        {{ $product->brand->name ?? 'Không có thương hiệu' }}
                                    </small>
                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-primary btn-sm">Xem sản phẩm</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <h5>Không tìm thấy sản phẩm nào</h5>
                            <p>Hãy thử tìm kiếm với từ khóa khác hoặc thay đổi bộ lọc.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <nav class="mt-4">
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </nav>
            @endif
        </div>
    </main>

@endsection

@section('extra-js')
    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection
