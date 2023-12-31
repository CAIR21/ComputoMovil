<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Vistas
$routes->get('/', 'Home::index');
$routes->get('inicio', 'Home::inicio');
$routes->get('Principal', 'Home::Menu_Principal');
$routes->get('Pelicula', 'Home::Menu_Pelicula');
$routes->get('Registro', 'Home::Registrar');
$routes->get('Categorias', 'Home::Menu_Categorias');
$routes->get('peliculas/(:num)', 'PeliculasController::show/$1');
$routes->get('busqueda/(:any)', 'Home::busqueda/$1');
$routes->get('BusquedaCat/(:any)', 'Home::busquedaCat/$1');

//Controladores
// $routes->resource('peliculas', ['controller' => 'PeliculasController']);
//CRUD peliculas
$routes->get('peliculas', 'PeliculasController::showall');
$routes->get('busquedaPeliculas/(:any)', 'PeliculasController::search/$1');
//Mostrar determinada pelicula por id

//CRUD usuarios
$routes->resource('usuarios', ['controller' => 'UsuariosController']);

$routes->resource('usuarios/(:num)', ['controller' => 'UsuariosController']);
$routes->get('Categoria/(:any)', 'PeliculasController::showall_categoria/$1');

$routes->post('login', 'UsuariosController::login');