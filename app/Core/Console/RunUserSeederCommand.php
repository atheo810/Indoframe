<?php

namespace app\Core\Console;

use app\Core\Database\Seeds\UserSeeder;

class RunUserSeederCommand extends Command
{
    protected $name = 'run:seed';

    protected $description = 'Run UserSeeder';

    public function run(array $input)
    {

        $seeder = new UserSeeder();
        $seeder->run();
    }
}
