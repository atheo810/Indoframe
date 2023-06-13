<?php

namespace app\Core\Console;

class MakeViewCommand extends Command
{
    protected $name = 'make:view';
    protected $description = 'Create new view file';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must type name of view." . PHP_EOL;
            return;
        }

        $viewName = $input[1];
        $viewFile = __DIR__ . "/../../Views/$viewName.php";

        if (file_exists($viewFile)) {
            echo "File view already exist." . PHP_EOL;
            return;
        }

        $viewContent = <<<EOT
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

        file_put_contents($viewFile, $viewContent);

        echo "Successed create view file : $viewName" . PHP_EOL;
    }
}
