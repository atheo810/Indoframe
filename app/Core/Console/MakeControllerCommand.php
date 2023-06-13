<?php

namespace app\Core\Console;

class MakeControllerCommand extends Command
{
    protected $name = 'make:controller';
    protected $description = 'Make a new file controller';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must type Controller name." . PHP_EOL;
            return;
        }

        $controllerName = $input[1];
        $controllerTemplate = <<<EOT
<?php

namespace app\Controllers;
use Atheo\Indoframe\Core\Http\BaseController;

class $controllerName extends BaseController
{
    public function index()
    {
        // Logika aksi di sini
    }
}
EOT;

        $controllerFile = CONTROLLERPATH . $controllerName . "Controller.php";

        if (file_exists($controllerFile)) {
            echo "Controller file already exist." . PHP_EOL;
            return;
        }

        file_put_contents($controllerFile, $controllerTemplate);

        echo "Successed create : $controllerName" ."Controller". PHP_EOL;
    }
}
