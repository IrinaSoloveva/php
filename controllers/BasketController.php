<?php

namespace app\controllers;

use app\engine\App;


class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('basket', [
            'products' => App::call()->basketRepository->getBasket(session_id())
        ]);
    }

    public function actionDelete()
    {
        //Прежде чем удалять, убедимся что сессия совпадает
        $idx = App::call()->request->getParams()['idx'];
        $basket = App::call()->basketRepository->getOne($idx);
        if (session_id() == $basket->session) App::call()->basketRepository->delete($basket);

        echo json_encode(['response' => 1]);
    }

}