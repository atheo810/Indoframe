<?php

namespace app\Core\Console;

class MakeModelCommand extends Command
{
    protected $name = 'make:model';
    protected $description = 'Create a new model file';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must type Model name." . PHP_EOL;
            return;
        }

        $modelName = $input[1];
        $modelTemplate = <<<EOT
<?php

namespace app\Models;

use Atheo\Indoframe\Core\Database\BaseConnection;
use Atheo\Indoframe\Models\BaseModel;

class $modelName extends BaseModel
{
    public function __construct(BaseConnection \$connection)
    {
        \$this->table = "$modelName";
        parent::__construct(\$connection);
    }
}
EOT;

        $modelFile = __DIR__ . "/../../Models/$modelName" . "Model.php";

        if (file_exists($modelFile)) {
            echo "Model file already exists." . PHP_EOL;
            return;
        }

        file_put_contents($modelFile, $modelTemplate);

        echo "Successfully created: $modelName" . "Model.php" . PHP_EOL;
    }
}
