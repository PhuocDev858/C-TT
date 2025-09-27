@extends('layouts.admin')

@section('title', 'Thêm Thương hiệu')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Thêm Thương hiệu</h1>

        <form action="{{ route('admin.brands.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên thương hiệu</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Quốc gia</label>
                <input type="text" name="country" id="country" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
