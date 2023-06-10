<?php

namespace Indoframe\Config;

use Indoframe\Core\Database\BaseConnection;
use Indoframe\Core\Database\MySQLConnection;

abstract class BaseService
{
    protected $connection;

    public function __construct(BaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public static function Indoframe()
    {
    }
}
