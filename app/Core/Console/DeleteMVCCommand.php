<?php

namespace app\Core\Console;

class DeleteMVCCommand extends Command
{
    protected $name = 'delete:mvc';
    protected $description = 'Delete an MVC package (View, Controller, Model)';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must provide a package name to delete." . PHP_EOL;
            return;
        }

        $packageName = $input[1];
        $controllerName = ucfirst($packageName) . 'Controller.php';
        $modelName = ucfirst($packageName) . 'Model.php';
        $viewName = ucfirst($packageName) . 'View.php';

        $controllerFile = CONTROLLERPATH . $controllerName;
        $modelFile = MODELPATH . $modelName;
        $viewFile = VIEWPATH . $viewName;

        $deletedFiles = [];

        if (file_exists($controllerFile)) {
            if (unlink($controllerFile)) {
                $deletedFiles[] = "Controller file: $controllerName";
            }
        }

        if (file_exists($modelFile)) {
            if (unlink($modelFile)) {
                $deletedFiles[] = "Model file: $modelName";
            }
        }

        if (file_exists($viewFile)) {
            if (unlink($viewFile)) {
                $deletedFiles[] = "View file: $viewName";
            }
        }

        if (empty($deletedFiles)) {
            echo "No files found for package: $packageName" . PHP_EOL;
            return;
        }

        echo "Successfully deleted the following files for package $packageName:" . PHP_EOL;
        foreach ($deletedFiles as $deletedFile) {
            echo $deletedFile . PHP_EOL;
        }
    }
}
