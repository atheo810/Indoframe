<?php

namespace app\Models;

use Atheo\Indoframe\Core\Database\BaseConnection;
use Atheo\Indoframe\Core\Database\QueryBuilder;
use Atheo\Indoframe\Models\BaseModel;

class UserModel extends BaseModel
{
    protected $table;
    protected $query;

    public function __construct(BaseConnection $connection)
    {
        parent::__construct($connection);
        $this->query = new QueryBuilder("users");
    }

    public function findAll(){
        return $this->query->select();
    }

}
