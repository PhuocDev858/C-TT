@extends('layouts.admin')

@section('title', 'Sửa Thương hiệu')

@section('content')
    <div class="container">
        <h1 class="mb-4">Sửa Thương hiệu</h1>

        {{-- Hiển thị lỗi validate --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form cập nhật --}}
        <form action="{{ route('admin.brands.update', $brand['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tên thương hiệu</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $brand['name']) }}" required>
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Quốc gia</label>
                <input type="text" name="country" id="country" class="form-control"
                    value="{{ old('country', $brand['country']) }}">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
