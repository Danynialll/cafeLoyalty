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
    $routes->get('/', function () {
        return redirect()->to('customer/login');
    });

    $routes->get('dashboard', [CustomerController::class, 'index']);
    $routes->get('membership', [CustomerController::class, 'membership']);
    $routes->get('history', [CustomerController::class, 'history']);
    $routes->get('order', [CustomerController::class, 'order']);
    $routes->get('voucher', [CustomerController::class, 'voucher']);
    $routes->get('profile', [CustomerController::class, 'profile']);
    $routes->get('spin_wheel', [CustomerController::class, 'spinWheel']);

    $routes->post('sendOtpWhatsapp', [CustomerAuthController::class, 'sendOtpWhatsApp']);
    $routes->post('verifyOtp', [CustomerAuthController::class, 'verifyOtp']);


    $routes->get('login', [CustomerAuthController::class, 'login']);
    $routes->get('register', [CustomerAuthController::class, 'register']);
    $routes->post('loginHandle', [CustomerAuthController::class, 'loginHandle']);
    $routes->post('registerHandle', [CustomerAuthController::class, 'registerHandle']);
    $routes->get('logout', [CustomerAuthController::class, 'logout']);
});
