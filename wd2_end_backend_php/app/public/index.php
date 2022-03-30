<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

//Create a Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

//Routes for the products endpoint
$router->get('/products', 'ProductController@getAll');
$router->get('/products/(\d+)', 'ProductController@getOne');
$router->post('/products', 'ProductController@create');
$router->put('/products', 'ProductController@update');
$router->delete('/products/(\d+)', 'ProductController@delete');

//Routes for the login endpoint
$router->get('/users/(\d+)', 'UserController@getOne');
$router->post('/users/login', 'UserController@login');

//Routes for the register endpoint
$router->post('/users/register', 'UserController@register');

//Routes for the order endpoint
$router->post('/orders/create', 'OrderController@createOrder');
$router->post('/orders/placeorder', 'OrderController@placeOrder');

$router->run();