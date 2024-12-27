<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/contact', 'Pages::contact');

$routes->get('film/create', 'Film::create');
$routes->get('/film/save', 'Film::save');
$routes->get('/film/edit/(:segment)', 'Film::edit/$1');
$routes->delete('/film/(:num)', 'Film::delete/$1');
$routes->get('/film/(:any)', 'Film::detail/$1');

$routes->get('/film/create', 'Film::create');

service('auth')->routes($routes);
