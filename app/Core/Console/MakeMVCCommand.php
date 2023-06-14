<?php

namespace app\Core\Console;

class MakeMVCCommand extends Command
{
    protected $name = 'make:mvc';
    protected $description = 'Create a new MVC package (View, Controller, Model)';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must type Package name." . PHP_EOL;
            return;
        }

        $packageName = $input[1];

        $this->makeView($packageName);
        $this->makeController($packageName);
        $this->makeModel($packageName);

        echo "Successfully created MVC package: $packageName" . PHP_EOL;
    }

    protected function makeView($packageName)
    {
        $viewName = ucfirst($packageName);
        $viewFolder = VIEWPATH . $viewName . "View.php";

        if (file_exists($viewFolder)) {
            echo "View folder already exists for $viewName." . PHP_EOL;
            return;
        }

        $viewTemplate = <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$viewName</title>
</head>
<body>

    
</body>
</html>
EOT;

        $viewFile = $viewFolder;

        file_put_contents($viewFile, $viewTemplate);

        echo "Successfully created view file for $viewName." . PHP_EOL;
    }

    protected function makeController($packageName)
    {
        $controllerName = ucfirst($packageName) . "Controller";
        $controllerTemplate = <<<EOT
<?php

namespace app\Controllers;

use Atheo\Indoframe\Core\Http\BaseController;

class $controllerName extends BaseController
{
    public function index()
    {
        // Logic goes here
    }
}
EOT;

        $controllerFile = CONTROLLERPATH . $controllerName . ".php";

        if (file_exists($controllerFile)) {
            echo "Controller file already exists for $packageName." . PHP_EOL;
            return;
        }

        file_put_contents($controllerFile, $controllerTemplate);

        echo "Successfully created controller file for $packageName." . PHP_EOL;
    }

    protected function makeModel($packageName)
    {
        $modelName = ucfirst($packageName) . "Model";
        $modelTemplate = <<<EOT
<?php

namespace app\Models;

use Atheo\Indoframe\Core\Database\BaseConnection;
use Atheo\Indoframe\Models\BaseModel;

class $modelName extends BaseModel
{
    public function __construct(BaseConnection \$connection)
    {
        \$this->table = "users";
        parent::__construct(\$connection);
    }
}
EOT;

        $modelFile = MODELPATH . $modelName . ".php";

        if (file_exists($modelFile)) {
            echo "Model file already exists for $packageName." . PHP_EOL;
            return;
        }

        file_put_contents($modelFile, $modelTemplate);

        echo "Successfully created model file for $packageName." . PHP_EOL;
    }
}
