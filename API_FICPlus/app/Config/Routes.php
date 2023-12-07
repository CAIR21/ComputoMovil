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
$routes->get('terror', 'PeliculasController::showall_terror');
$routes->post('login', 'UsuariosController::login');