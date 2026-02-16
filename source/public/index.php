<?php
session_start();

require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Middleware/AuthMiddleware.php';
require_once __DIR__ . '/../src/Controllers/HomeController.php';
require_once __DIR__ . '/../src/Controllers/AuthController.php';
require_once __DIR__ . '/../src/Controllers/UserController.php';
require_once __DIR__ . '/../src/Controllers/AdminController.php';

$router = new Router();

// Public routes
$router->get('/', 'HomeController@index');
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@doLogin');
$router->post('/logout', 'AuthController@logout');
$router->get('/users/{id}', 'UserController@show');

// Admin routes
$router->get('/admin/dashboard', 'AdminController@dashboard');
$router->post('/admin/execute', 'AdminController@execute');

$router->dispatch();