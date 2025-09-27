@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h1 class="fw-bold text-center mb-4" style="color:#fff;">Danh sách sản phẩm</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">+ Thêm sản phẩm</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card shadow-sm border-0" style="background:#23262f; color:#eaeaea; border-radius:1rem;">
            <div class="card-body p-0">
                <table class="table mb-0" style="background:#23262f; color:#eaeaea; border-radius:1rem; overflow:hidden;">
                    <thead style="background:#181a20; color:#fff;">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Kho</th>
                            <th>Trạng thái</th>
                            <th>Thương hiệu</th>
                            <th>Danh mục</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr style="border-bottom:1px solid #23262f;">
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if ($product->image)
                                        @php
                                            $img = $product->image;
                                            if (substr($img, 0, 8) === 'storage/') {
                                                $img = asset($img);
                                            }
                                        @endphp
                                        <img src="{{ $img }}" alt="{{ $product->name }}" width="50">
                                    @endif
                                </td>
                                <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->status }}</td>
                                <td>{{ $product->brand->name ?? '' }}</td>
                                <td>{{ $product->category->name ?? '' }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="btn btn-sm btn-warning me-1" style="border-radius:0.5rem;">Sửa</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            style="border-radius:0.5rem;">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <style>
        .table th,
        .table td {
            vertical-align: middle !important;
        }

        .table tbody tr:hover {
            background: #181a20 !important;
        }

        .btn-warning {
            background: #f59e42 !important;
            color: #fff !important;
        }

        .btn-danger {
            background: #ef4444 !important;
            color: #fff !important;
        }

        .btn-primary {
            background: #2563eb !important;
            color: #fff !important;
        }
    </style>
@endpush
