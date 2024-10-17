<?php
use App\Core\Router;
use App\Middleware\AuthMiddleware;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\ErrorController; // Import your ErrorController

$authMiddleware = AuthMiddleware::class;

// Define your routes
Router::add('/', [HomeController::class, 'index'], $authMiddleware);
Router::add('/products', [ProductController::class, 'index'], $authMiddleware);
Router::add('/products/create', [ProductController::class, 'create'], $authMiddleware);
Router::add('/products/edit/(\d+)', [ProductController::class, 'edit'], $authMiddleware);
Router::add('/products/delete/(\d+)', [ProductController::class, 'delete'], $authMiddleware);

// Set the 404 handler
Router::setNotFound(function () {
    $controllerInstance = new ErrorController();
    return $controllerInstance->notFound(); // Call the notFound method in ErrorController
});
