<?php

namespace app\Models;

use Atheo\Indoframe\Core\Database\MySQLConnection;
use Atheo\Indoframe\Models\BaseModel;

class AtheoModel extends BaseModel
{
    public static function create()
    {
        $connection = new MySQLConnection();
        $table = 'users';
        self::init($connection, $table);
        return self::class;
    }

}
