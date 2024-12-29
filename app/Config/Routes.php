<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::login'); // Affiche le formulaire
$routes->post('login', 'Auth::auth'); // Gère la soumission
$routes->get('logout', 'Auth::logout'); // Déconnexion

$routes->get('dashboard', 'Auth::dashboard'); // Route for the dashboard
// Page sécurisée
