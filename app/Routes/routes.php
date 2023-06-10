<?php 

use Atheo\Indoframe\Core\Routing\Router;

$router = new Router();

$router->get('/home', 'HomeController', 'index');
$router->get('/about', 'HomeController', 'index');

return $router;