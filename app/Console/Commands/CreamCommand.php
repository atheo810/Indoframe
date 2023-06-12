<?php

namespace App\Console\Commands;

use Atheo\Indoframe\Core\Console\Command;
use Atheo\Indoframe\Core\Cream;

class CreamCommand extends Command
{
    protected $signature = 'cream:run';

    public function handle()
    {
        $cream = new Cream();
        $cream->run();
    }
}
