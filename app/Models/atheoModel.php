<?php

namespace app\Models;

use Atheo\Indoframe\Core\Database\BaseConnection;
use Atheo\Indoframe\Models\BaseModel;

class atheo extends BaseModel
{
    public function __construct(BaseConnection $connection)
    {
        $this->table = "atheo";
        parent::__construct($connection);
    }
}