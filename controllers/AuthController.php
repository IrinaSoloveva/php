<?php

namespace app\controllers;

use app\engine\App;

class AuthController extends Controller
{

    public function actionLogin()
    {
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];

        App::call()->userRepository->authUser($login, $pass);


        header("Location: /");
    }

    public function actionLogout()
    {
        unset($_SESSION['login']);
        header("Location: /");
    }
}