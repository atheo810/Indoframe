<?php

namespace app\Controllers;

use Atheo\Indoframe\Core\Http\BaseController;
use app\Models\AtheoModel;
use PDO;

class AtheoController extends BaseController
{
    public function index()
    {
        AtheoModel::create();
        AtheoModel::select();
        $baru = AtheoModel::execute();
        $result = $baru->fetchALL(PDO::FETCH_ASSOC);
        $data= [
            'baru' => $result
        ];
        $this->view("Atheo", $data);
    }
}
