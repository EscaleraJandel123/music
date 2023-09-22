<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/', 'MusicPlayerController::index');
$routes->post('/add-to-playlist', 'MusicPlayerController::addToPlaylist');
// Add more routes as needed
