<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('caisse/choix', 'CaisseController::choix');
$routes->get('caisse/valider', 'CaisseController::valider');