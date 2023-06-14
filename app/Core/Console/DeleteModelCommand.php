<?php

namespace app\Core\Console;

class DeleteModelCommand extends Command
{
    protected $name = 'delete:model';
    protected $description = 'Delete a model file';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must provide a model name to delete." . PHP_EOL;
            return;
        }

        $modelName = ucfirst($input[1]);
        $modelFile = MODELPATH . $modelName . 'Model.php';

        if (!file_exists($modelFile)) {
            echo "Model file does not exist: $modelName" . PHP_EOL;
            return;
        }

        if (!unlink($modelFile)) {
            echo "Failed to delete model file: $modelName" . PHP_EOL;
            return;
        }

        echo "Successfully deleted model file: $modelName" . PHP_EOL;
    }
}
