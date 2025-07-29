<?php
use Config\Services;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;
use Modules\Counter\Controllers\SubmitController;
use Modules\Counter\Controllers\CounterController;
use Modules\Counter\Controllers\LoyaltyController;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', function () {
    return redirect()->to('/counter');
});

$routes->group('counter', function($routes) {
    $routes->get('/', [CounterController::class, 'index']);
    $routes->get('loyalty/checkCode/(:any)', [LoyaltyController::class, 'checkCode/$1']);
    $routes->get('loyalty/checkNum/(:any)', [LoyaltyController::class, 'checkNum/$1']);
    $routes->post('submit', [SubmitController::class, 'submit']);
});
