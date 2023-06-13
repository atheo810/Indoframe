<?php

namespace app\Core;

use app\Core\Console\Command;

class Cream
{
    protected $commands = [];

    public function registerCommand(Command $command)
    {
        $this->commands[] = $command;
    }

    public function run()
    {
        $input = $this->parseInput();
        $commandName = $input[0] ?? null;

        if (!$commandName) {
            $this->showAvailableCommands();
            return;
        }

        foreach ($this->commands as $command) {
            if ($command->getName() === $commandName) {
                $command->run($input);
                return;
            }
        }

        $this->showCommandNotFound($commandName);
    }

    protected function parseInput()
    {
        global $argv;
        return array_slice($argv, 1);
    }

    protected function showAvailableCommands()
    {
        echo "\033[1mAvailable commands:\033[0m" . PHP_EOL;
    
        foreach ($this->commands as $command) {
            echo "\033[33m* " . $command->getName() . ":\033[0m " . $command->getDescription() . PHP_EOL;
        }
    }
    

    protected function showCommandNotFound($commandName)
    {
        echo "Command not found: " . $commandName . PHP_EOL;
    }
}
