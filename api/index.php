<?php

<<<<<<< HEAD
// Load the Laravel application
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Run the application
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
$response->send();
$kernel->terminate($request, $response);
=======
require __DIR__ . "/../public/index.php";
>>>>>>> 6933ae638fab58af6b67d3cd39b4414a101d0849
