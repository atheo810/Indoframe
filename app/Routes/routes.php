<?php 

use Atheo\Indoframe\Core\Routing\Router;

$router = new Router();

$router->get('/home', 'HomeController', 'index');
$router->get('/user', 'UserController', 'index');

return $router;