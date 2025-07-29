<?php
use Config\Services;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

use Modules\Customer\Controllers\CustomerController;

/**
 * @var RouteCollection $routes
 */

$routes->group('customer', function($routes) {
    $routes->get('/', [CustomerController::class, 'index']);
    // $routes->get('loyalty/checkCode/(:any)', [LoyaltyController::class, 'checkCode/$1']);
    // $routes->get('loyalty/checkNum/(:any)', [LoyaltyController::class, 'checkNum/$1']);
    // $routes->post('submit', [SubmitController::class, 'submit']);
});
