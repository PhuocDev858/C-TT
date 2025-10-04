@extends('layouts.client')

@section('title', 'Hãng Xe Máy - QLXM')
@section('description', 'Xem danh sách các hãng xe máy uy tín như Honda, Yamaha, Suzuki tại QLXM')

@push('styles')
    <style>
        /* Custom styles for brand logos */
        .brand-grid .team-member {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            height: 100%;
        }

        .brand-grid .team-member:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .brand-grid .thumb-container {
            position: relative;
            height: 200px !important;
            background: #ffffff;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 20px;
            overflow: hidden;
        }

        .brand-grid .thumb-container img {
            max-width: 180px !important;
            max-height: 160px !important;
            width: auto !important;
            height: auto !important;
            object-fit: contain !important;
            object-position: center !important;
            transition: transform 0.3s ease;
        }

        .brand-grid .thumb-container:hover img {
            transform: scale(1.1);
        }

        .brand-grid .hover-effect {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(243, 63, 63, 0.9);
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-grid .thumb-container:hover .hover-effect {
            opacity: 1;
        }

        .brand-grid .down-content {
            padding: 25px 20px;
            text-align: center;
            background: #fff;
        }

        .brand-grid .down-content h4 {
            color: #333;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .brand-grid .down-content span {
            color: #f33f3f;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .brand-grid .down-content p {
            color: #666;
            font-size: 14px;
            line-height: 1.7;
            margin-top: 15px;
            margin-bottom: 0;
        }

        /* Ensure equal height columns */
        .brand-grid .row {
            display: flex;
            flex-wrap: wrap;
        }

        .brand-grid .col-md-4 {
            display: flex;
            margin-bottom: 30px;
        }

        .filled-button {
            background: #fff !important;
            color: #f33f3f !important;
            border: 2px solid #fff !important;
            padding: 12px 25px !important;
            border-radius: 25px !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            font-size: 12px !important;
            letter-spacing: 1px !important;
            transition: all 0.3s ease !important;
        }

        .filled-button:hover {
            background: transparent !important;
            color: #fff !important;
            border-color: #fff !important;
            text-decoration: none !important;
        }
    </style>
@endpush

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
            </div>

            <div class="brand-grid">
                <div class="row">
                    <!-- Honda -->
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="thumb-container">
                                <img src="{{ asset('img/brands/honda.jpg') }}" alt="Honda">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <a href="{{ route('client.brands.show', 1) }}" class="filled-button">Xem Xe
                                            Honda</a>
                                    </div>
                                </div>
                            </div>
                            <div class="down-content">
                                <h4>Honda</h4>
                                <span>Nhật Bản</span>
                                <p>Thương hiệu xe máy uy tín với chất lượng cao, tiết kiệm nhiên liệu và độ bền vượt trội.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Yamaha -->
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="thumb-container">
                                <img src="{{ asset('img/brands/yamaha.png') }}" alt="Yamaha">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <a href="{{ route('client.brands.show', 2) }}" class="filled-button">Xem Xe
                                            Yamaha</a>
                                    </div>
                                </div>
                            </div>
                            <div class="down-content">
                                <h4>Yamaha</h4>
                                <span>Nhật Bản</span>
                                <p>Chuyên về xe thể thao với thiết kế năng động, hiệu suất cao và công nghệ tiên tiến.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Suzuki -->
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="thumb-container">
                                <img src="{{ asset('img/brands/suzuki.jpg') }}" alt="Suzuki">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <a href="{{ route('client.brands.show', 3) }}" class="filled-button">Xem Xe
                                            Suzuki</a>
                                    </div>
                                </div>
                            </div>
                            <div class="down-content">
                                <h4>Suzuki</h4>
                                <span>Nhật Bản</span>
                                <p>Tập trung vào động cơ mạnh mẽ với thiết kế thể thao ấn tượng và hiệu suất vượt trội.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Ducati -->
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="thumb-container">
                                <img src="{{ asset('img/brands/ducati.jpg') }}" alt="Ducati">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <a href="{{ route('client.brands.show', 4) }}" class="filled-button">Xem Xe
                                            Ducati</a>
                                    </div>
                                </div>
                            </div>
                            <div class="down-content">
                                <h4>Ducati</h4>
                                <span>Ý</span>
                                <p>Thương hiệu xe mô tô cao cấp với thiết kế Italian sang trọng và công nghệ đỉnh cao.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kawasaki -->
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="thumb-container">
                                <img src="{{ asset('img/brands/kawasaki.jpg') }}" alt="Kawasaki">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <a href="{{ route('client.brands.show', 5) }}" class="filled-button">Xem Xe
                                            Kawasaki</a>
                                    </div>
                                </div>
                            </div>
                            <div class="down-content">
                                <h4>Kawasaki</h4>
                                <span>Nhật Bản</span>
                                <p>Nổi tiếng với dòng xe thể thao Ninja, mạnh mẽ và tốc độ cao với thiết kế đặc trưng.</p>
                            </div>
                        </div>
                    </div>

                    <!-- SYM -->
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="thumb-container">
                                <img src="{{ asset('img/brands/sym.jpg') }}" alt="SYM">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <a href="{{ route('client.brands.show', 6) }}" class="filled-button">Xem Xe SYM</a>
                                    </div>
                                </div>
                            </div>
                            <div class="down-content">
                                <h4>SYM</h4>
                                <span>Đài Loan</span>
                                <p>Xe máy chất lượng cao với giá cả hợp lý, phù hợp cho nhu cầu di chuyển hàng ngày.</p>
                            </div>
                        </div>
                    </div>

                    <!-- GPX -->
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="thumb-container">
                                <img src="{{ asset('img/brands/gpx.jpg') }}" alt="GPX">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <a href="{{ route('client.brands.show', 7) }}" class="filled-button">Xem Xe GPX</a>
                                    </div>
                                </div>
                            </div>
                            <div class="down-content">
                                <h4>GPX</h4>
                                <span>Thái Lan</span>
                                <p>Thương hiệu xe máy mới nổi với thiết kế trẻ trung và công nghệ hiện đại.</p>
                            </div>
                        </div>
                    </div>

                    <!-- VinFast -->
                    <div class="col-md-4">
                        <div class="team-member">
                            <div class="thumb-container">
                                <img src="{{ asset('img/brands/vinfast.jpg') }}" alt="VinFast">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <a href="{{ route('client.brands.show', 8) }}" class="filled-button">Xem Xe
                                            VinFast</a>
                                    </div>
                                </div>
                            </div>
                            <div class="down-content">
                                <h4>VinFast</h4>
                                <span>Việt Nam</span>
                                <p>Thương hiệu xe điện tiên phong tại Việt Nam với công nghệ thông minh và thân thiện môi
                                    trường.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Comparison -->

@endsection
