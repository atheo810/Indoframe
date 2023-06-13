<?php

namespace app\Core\Console;

abstract class Command
{
    protected $name;
    protected $description;

    abstract public function run(array $input);

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
