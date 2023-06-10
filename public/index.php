<?php


// Check PHP version

$minimumPhpVersion = '8'; // If you update this, don't forget to update `dragon`.
if (version_compare(PHP_VERSION, $minimumPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run Indoframe. Current version: %s',
        $minimumPhpVersion,
        PHP_VERSION
    );

    exit($message);
}


// // load composer 
// require_once '../vendor/autoload.php';

// define Path to the front Controller ( this file )
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

chdir(FCPATH);

// Load our path configs file
require FCPATH . '../app/Config/Paths.php';
// change line if you want to your application folder  

// instance Paths
$paths = new Indoframe\Config\Paths();


// Location of the Framework bootstrap file.
require rtrim($paths->appDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';


$router = require_once APPPATH . '/Routes/routes.php';

$requestUri = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($requestUri);
$path = $parsedUrl['path'];
$path = $path === '' ? '/' : $path;
if (strpos($path, '/cobabuat/public') === 0) {
    $path = substr($path, strlen('/cobabuat/public'));
}
$_SERVER['REQUEST_URI'] = '/' . trim($path, '/');

$router->run();
