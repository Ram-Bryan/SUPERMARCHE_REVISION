<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->post('login', 'AuthController::login');
$routes->get('caisse/choix', 'CaisseController::choix');
$routes->get('caisse/valider', 'CaisseController::valider');
$routes->get('produit/pdf', 'ProduitPdf::generate');
$routes->get('produit/csv/export', 'ProduitCsv::export');
$routes->get('produit/csv/exportAdvanced', 'ProduitCsv::exportAdvanced');
$routes->post('produit/csv/import', 'ProduitCsv::import');
$routes->post('produit/csv/importAdvanced', 'ProduitCsv::importAdvanced');