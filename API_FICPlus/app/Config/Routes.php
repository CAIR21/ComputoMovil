<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Vistas
$routes->get('/', 'Home::index');
$routes->get('inicio', 'Home::inicio');
$routes->get('Principal', 'Home::Menu_Principal');
$routes->get('Registro', 'Home::Registrar');
//Controladores
// $routes->resource('peliculas', ['controller' => 'PeliculasController']);
$routes->get('peliculas', 'PeliculasController::showall');
$routes->resource('usuarios', ['controller' => 'UsuariosController']);
<<<<<<< HEAD
$routes->resource('usuarios/(:num)', ['controller' => 'UsuariosController']);
=======
$routes->get('terror', 'PeliculasController::showall_terror');
>>>>>>> 134457472a6cddfe2cea37ad20855d2d583a9587
$routes->post('login', 'UsuariosController::login');