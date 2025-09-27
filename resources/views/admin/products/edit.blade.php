@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá <span class="text-danger">*</span></label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh sản phẩm</label>
                @if ($product->image)
                    <div class="mb-2">
                        <img src="{{ substr($product->image, 0, 8) === 'storage/' ? asset($product->image) : $product->image }}"
                            alt="Ảnh hiện tại" width="80">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small class="text-muted">Để trống nếu không muốn thay đổi ảnh</small>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Kho</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="available" @if (old('status', $product->status) == 'available') selected @endif>Còn hàng</option>
                    <option value="unavailable" @if (old('status', $product->status) == 'unavailable') selected @endif>Hết hàng</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="brand_id" class="form-label">Thương hiệu <span class="text-danger">*</span></label>
                <select name="brand_id" class="form-control" required>
                    <option value="">-- Chọn thương hiệu --</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục <span class="text-danger">*</span></label>
                <select name="category_id" class="form-control" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
