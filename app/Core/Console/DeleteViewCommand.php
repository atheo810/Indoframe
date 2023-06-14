<?php

namespace app\Core\Console;

class DeleteViewCommand extends Command
{
    protected $name = 'delete:view';
    protected $description = 'Delete a view file';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must provide a view name to delete." . PHP_EOL;
            return;
        }

        $viewName = ucfirst($input[1]);
        $viewFile = VIEWPATH . $viewName . 'View.php';

        if (!file_exists($viewFile)) {
            echo "View file does not exist: $viewName" . PHP_EOL;
            return;
        }

        if (!unlink($viewFile)) {
            echo "Failed to delete view file: $viewName" . PHP_EOL;
            return;
        }

        echo "Successfully deleted view file: $viewName" . PHP_EOL;
    }
}
