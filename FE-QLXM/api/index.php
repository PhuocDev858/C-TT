<?php

// Simple PHP entry point for Vercel
header('Content-Type: text/html; charset=utf-8');

// Basic Laravel-like routing
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($request_uri, PHP_URL_PATH);

// Serve static files if they exist
$public_file = __DIR__ . '/../public' . $path;
if (file_exists($public_file) && !is_dir($public_file)) {
    return false; // Let Vercel handle static files
}

// For Laravel, we need to bootstrap the app
// But since we can't run full Laravel on Vercel easily, 
// let's create a simple response
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QLXM - Quản Lý Xe Máy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">QLXM - Hệ thống Quản Lý Xe Máy</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-center">Website đang hoạt động trên Vercel!</p>
                        <p class="text-center">
                            <strong>Frontend:</strong> https://fe-qlxm.vercel.app<br>
                            <strong>Backend API:</strong> https://qlxm-778654bd1837.herokuapp.com
                        </p>
                        <div class="text-center">
                            <a href="/admin" class="btn btn-primary">Admin Panel</a>
                            <a href="/login" class="btn btn-secondary">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- API Configuration -->
    <script src="/js/config.js"></script>
    <script src="/js/api-test.js"></script>
    <script>
        console.log('🚀 Website loaded successfully!');
        console.log('Backend API:', window.config?.API_BASE_URL);
    </script>
</body>

</html>