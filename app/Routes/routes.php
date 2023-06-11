<?php 

use Atheo\Indoframe\Core\Routing\Router;

$router = new Router();

// Menambahkan rute menggunakan metode statis pada kelas Route
$router::get('/home', 'HomeController', 'index');
$router::get('/user', 'UserController', 'index');

// Mengembalikan objek Router
return $router;
