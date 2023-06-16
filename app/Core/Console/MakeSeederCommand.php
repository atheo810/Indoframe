<?php

namespace app\Core\Console;

class MakeSeederCommand extends Command
{
    protected $name = 'make:seeder';
    protected $description = 'Create a new seeder file';

    public function run(array $input)
    {
        if (count($input) < 2) {
            echo "You must type seeder name." . PHP_EOL;
            return;
        }

        $name = $input[1];
        $className = $name . 'Seeder';
        $filePath = 'app/Core/Database/Seeds/' . $className . '.php';

        if (file_exists($filePath)) {
            echo "Seeder file already exists." . PHP_EOL;
            return;
        }

        $stub = <<<EOT
<?php

namespace app\Core\Database\Seeds;

use Atheo\Indoframe\Core\Database\MySQLConnection;
use Atheo\Indoframe\Core\Database\Seeds\Seeder;

class $className extends Seeder
{
    protected \$connection;
    protected string \$table = '';

    public function __construct()
    {
        \$this->connection = new MySQLConnection();
        parent::__construct();
    }

    public function run()
    {
        // Implementasi logika seeder di sini
    }
}

EOT;

        file_put_contents($filePath, $stub);
        echo "Successfully created: $className.php" . PHP_EOL;
    }
}
