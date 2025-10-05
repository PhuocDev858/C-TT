<?php
// Simple PHP frontend that calls Laravel Backend API

$backend_api = 'https://qlxm-778654bd1837.herokuapp.com';

// Test API connection
function testAPI($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ['status' => $httpCode, 'data' => $response];
}

$api_test = testAPI($backend_api . '/api/test');
$products_test = testAPI($backend_api . '/api/client/products');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QLXM Frontend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center mb-5">
                    <h1 class="display-4"><i class="bi bi-motorcycle"></i> QLXM Frontend</h1>
                    <p class="lead">Laravel Frontend deployed on Heroku</p>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5><i class="bi bi-api"></i> Backend API Status</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Backend URL:</strong> <?= $backend_api ?></p>

                        <div class="row">
                            <div class="col-md-6">
                                <h6>API Test Endpoint</h6>
                                <span class="badge bg-<?= $api_test['status'] == 200 ? 'success' : 'danger' ?>">
                                    Status: <?= $api_test['status'] ?>
                                </span>
                                <pre class="mt-2"><?= htmlspecialchars(substr($api_test['data'], 0, 100)) ?></pre>
                            </div>

                            <div class="col-md-6">
                                <h6>Products API</h6>
                                <span class="badge bg-<?= $products_test['status'] == 200 ? 'success' : 'danger' ?>">
                                    Status: <?= $products_test['status'] ?>
                                </span>
                                <pre class="mt-2"><?= htmlspecialchars(substr($products_test['data'], 0, 100)) ?>...</pre>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5><i class="bi bi-list"></i> Available Routes</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Frontend Routes</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="/">Home</a></li>
                                    <li class="list-group-item"><a href="/motorcycles.php">Motorcycles</a></li>
                                    <li class="list-group-item"><a href="/brands.php">Brands</a></li>
                                    <li class="list-group-item"><a href="/contact.php">Contact</a></li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <h6>Backend API Routes</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="<?= $backend_api ?>/api/client/products" target="_blank">
                                            GET /api/client/products
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="<?= $backend_api ?>/api/client/brands" target="_blank">
                                            GET /api/client/brands
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="<?= $backend_api ?>/api/test" target="_blank">
                                            GET /api/test
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <small class="text-muted">
                        Frontend: Heroku PHP | Backend: Laravel API on Heroku
                    </small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>