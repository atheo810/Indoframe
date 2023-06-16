<?php

namespace app\Core\Console;

class DeleteSeederCommand extends Command
{
    protected $name = 'delete:seeder';
    protected $description = 'Delete a seeder file';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must specify the seeder name." . PHP_EOL;
            return;
        }

        $name = $input[1];
        $className = $name . 'Seeder';
        $filePath = 'app/Core/Database/Seeds/' . $className . '.php';

        if (!file_exists($filePath)) {
            echo "Seeder file does not exist." . PHP_EOL;
            return;
        }

        if (unlink($filePath)) {
            echo "Successfully deleted: $className.php" . PHP_EOL;
        } else {
            echo "Failed to delete seeder file." . PHP_EOL;
        }
    }
}
