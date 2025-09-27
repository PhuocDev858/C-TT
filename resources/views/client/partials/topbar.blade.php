<!-- Top Header Bar -->
<div class="top-header bg-light py-2 border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="contact-info">
                    <small class="text-muted">
                        <i class="fas fa-phone"></i> Hotline: 0123.456.789 
                        <span class="mx-2">|</span>
                        <i class="fas fa-envelope"></i> info@kinhdoanhxemay.vn
                    </small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="auth-links text-end">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">
                            <i class="fas fa-sign-in-alt"></i> Đăng Nhập
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-user-plus"></i> Đăng Ký
                        </a>
                    @else
                        <div class="dropdown d-inline-block">
                            <button class="btn btn-outline-success btn-sm dropdown-toggle" 
                                    type="button" 
                                    id="userDropdown" 
                                    data-bs-toggle="dropdown" 
                                    aria-expanded="false">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fas fa-user-edit"></i> Hồ Sơ
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('orders') }}">
                                        <i class="fas fa-shopping-bag"></i> Đơn Hàng
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Đăng Xuất
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>