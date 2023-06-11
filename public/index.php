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

// Get Current URI
$requestUri = $_SERVER['REQUEST_URI'];

// Get path from URI
$parsedUrl = parse_url($requestUri);
$path = $parsedUrl['path'];



// Choose public directory from  folder 'public' position in path
$publicDir = getPublicDirectory($path);

// Delete public directory from URI
$path = removePublicDirectory($path, $publicDir);

// Reset REQUEST_URI with choosen path
$_SERVER['REQUEST_URI'] = '/' . trim($path, '/');

// Function for get public directory berdasarkan position form folder 'public' in path
function getPublicDirectory($path)
{
    $publicDir = '/public'; // default value public directory

    // Find Position folder 'public' in path
    $publicPos = strpos($path, '/public');

    // If folder 'public' Found, set public directory from that position 
    if ($publicPos !== false) {
        $publicDir = substr($path, 0, $publicPos + strlen('/public'));
    }

    return $publicDir;
}

// Function for delete public directory from URI
function removePublicDirectory($path, $publicDir)
{
    // Delete public directory from begining path if found
    if (strpos($path, $publicDir) === 0) {
        $path = substr($path, strlen($publicDir));
    }

    return $path;
}

$router = require_once APPPATH . '/Routes/routes.php';

$router->run();
