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


use Atheo\Indoframe\Core\Database\MySQLConnection;
use Atheo\Indoframe\Config\Database\BaseConnection;
use Atheo\Indoframe\Core\Database\QueryBuilder;
use Atheo\Indoframe\Core\Routing\Router;
use Atheo\Indoframe\Controllers\HomeController;

// $sql = new MySQLConnection();

// $sql->connect();

// $querybuilder = $sql->table("baru")->select(["baca,dan"])->where([
//     "nama" => 'John',
//     "atheo" => ['>', 30]
// ], "OR")->innerJoin("project", "saya")->getQuery();
// var_dump($querybuilder);

// $insert = $sql->table("atheo")->insert([
//     "kolom 1" => "nilai 1",
//     "kolom 2" => "nilai 2",
// ]);

// var_dump($insert->getQuery());

// $data = [
//     'name' => 'John Doe',
//     'email' => 'johndoe@example.com',
//     'age' => 30
// ];
// $update = $sql->table("tabel_update")->update($data)->where(['id' => 1]);
// var_dump($update->getQuery());

// $connection = new MySQLConnection();
// $connection->connect();

// $query = "SELECT * FROM users";
// $result = $connection->query($query);
// $rows = $result->fetchAll();
// var_dump($rows);

// $execte = $connection->table("users")->select()->where(["id" => 2])->execute()->fetchAll();

// var_dump($execte);

// $query = new MySQLConnection();
// $query->connect();

// $data = $query->table("users")->select("nama")->where(["id" => 1])->execute()->fetchAll();
// var_dump($data);


// var_dump($_SERVER['REQUEST_METHOD'] . " dan " . $_SERVER['REQUEST_URI']);

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
