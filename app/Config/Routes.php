<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('/usuarios/registrar', 'Users::create');
$routes->post('/usuarios/guardar' , 'Users::store');
$routes->get('/usuarios/mostrar/(:num)' , 'Users::show/$1');
$routes->get('/usuarios/editar/(:num)' , 'Users::edit/$1');
$routes->post('/usuarios/actualizar/(:num)' , 'Users::update/$1');
$routes->get('/usuarios/listar' , 'Users::list');
$routes->get('/usuarios/desactivar/(:num)' , 'Users::delete/$1');
