<?php

namespace app\Core\Database\Seeds;

use Atheo\Indoframe\Core\Database\MySQLConnection;
use Atheo\Indoframe\Core\Database\Seeds\Seeder;

class UserSeeder extends Seeder
{
    protected string $table = "users";
    protected $connction;

    public function __construct()
    {
        $this->connection = new MySQLConnection();
        parent::__construct();
    }

    public function run()
    {

        $data = [
            "nama" => "buat baru",
            "status" => "seeder"
        ];
        $this->queryBuilder->insert($data)->execute();
        $this->output('User Seeding Complete');
    }
}
