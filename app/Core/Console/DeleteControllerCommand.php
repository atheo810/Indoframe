<?php

namespace app\Core\Console;

class DeleteControllerCommand extends Command
{
    protected $name = 'delete:controller';
    protected $description = 'Delete a controller file';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must provide a controller name to delete." . PHP_EOL;
            return;
        }

        $controllerName = ucfirst($input[1]);
        $controllerFile = CONTROLLERPATH . $controllerName . 'Controller.php';

        if (!file_exists($controllerFile)) {
            echo "Controller file does not exist: $controllerName" . PHP_EOL;
            return;
        }

        if (!unlink($controllerFile)) {
            echo "Failed to delete controller file: $controllerName" . PHP_EOL;
            return;
        }

        echo "Successfully deleted controller file: $controllerName" . PHP_EOL;
    }
}
