<?php

namespace app\Controllers;

use app\Models\UserModel;
use Atheo\Indoframe\Core\Http\BaseController;
use Atheo\Indoframe\Core\Database\MySQLConnection;

class UserController extends BaseController
{
    public function index()
    {
        $mysql = new MySQLConnection();
        $userModel = new UserModel($mysql);
        $userModel->findAll();
        $data = [
            $userModel,
        ];
        // Lakukan sesuatu dengan data pengguna yang ditemukan

        $this->view('users.index', $data);

        // $querybuilder = $sql->table("baru")->select(["baca,dan"])->where([
        //     "nama" => 'John',
        //     "atheo" => ['>', 30]
        // ], "OR")->innerJoin("project", "saya")->getQuery();
        // var_dump($querybuilder);

        // $insert = $sql->table("atheo")->insert([
        //     "kolom 1" => "nilai 1",
        //     "kolom 2" => "nilai 2",
        // ]);


        // $data = [
        //     'name' => 'John Doe',
        //     'email' => 'johndoe@example.com',
        //     'age' => 30
        // ];
        // $update = $sql->table("tabel_update")->update($data)->where(['id' => 1]);


        // $query = "SELECT * FROM users";
        // $result = $connection->query($query);
        // $rows = $result->fetchAll();

        // $execte = $connection->table("users")->select()->where(["id" => 2])->execute()->fetchAll();

        // $data = $query->table("users")->select("nama")->where(["id" => 1])->execute()->fetchAll();
    }
}
