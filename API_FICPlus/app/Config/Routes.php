<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('inicio', 'Home::inicio');
// $routes->resource('peliculas', ['controller' => 'PeliculasController']);
$routes->get('peliculas', 'PeliculasController::showall');
$routes->resource('usuarios', ['controller' => 'UsuariosController']);
$routes->post('login', 'UsuariosController::login');