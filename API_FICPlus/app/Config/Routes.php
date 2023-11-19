<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->resource('peliculas', ['controller' => 'PeliculasController']);
$routes->resource('usuarios', ['controller' => 'UsuariosController']);