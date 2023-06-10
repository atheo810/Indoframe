<?php 

namespace app\Controllers;

use Atheo\Indoframe\Core\Http\BaseController;

class HomeController extends BaseController{
    public function index(){
        $data = [
            "title" => "Selamat Datang"
        ];
        $this->view('Home.index', $data);
    }
}