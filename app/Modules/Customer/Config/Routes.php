<?php
use Config\Services;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

use Modules\Customer\Controllers\CustomerController;
use Modules\Customer\Controllers\CustomerAuthController;

/**
 * @var RouteCollection $routes
 */

$routes->group('customer', function($routes) {
    $routes->get('dashboard', [CustomerController::class, 'index']);
    $routes->get('membership', [CustomerController::class, 'membership']);
    $routes->get('login', [CustomerAuthController::class, 'login']);
    $routes->get('register', [CustomerAuthController::class, 'register']);
    $routes->post('loginHandle', [CustomerAuthController::class, 'loginHandle']);
    $routes->post('registerHandle', [CustomerAuthController::class, 'registerHandle']);
    $routes->post('logout', [CustomerAuthController::class, 'logout']);
});
