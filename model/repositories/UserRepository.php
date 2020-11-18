<?php

namespace app\model\repositories;

use app\model\Repository;
use app\model\entities\Users;


class UserRepository extends Repository
{


    public function authUser($login, $pass) {
        $sql = "SELECT * FROM users WHERE login = :login";
        $hash_pass = $this->db->queryOne($sql, ['login' => $login])['pass'];
        if (password_verify($pass, $hash_pass)) {
            $_SESSION['login'] = $login;
        }
    }

    public function isAuth() {
        return isset($_SESSION['login']);
    }

    public function getUser() {
        return $_SESSION['login'];
    }

    public function isAdmin() {
        return $_SESSION['login'] == 'admin';
    }

    public function getTableName()
    {
        return "users";
    }

    public function getEntityClass()
    {
        return Users::class;
    }

}