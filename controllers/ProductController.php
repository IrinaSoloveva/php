<?php

namespace app\controllers;

use app\model\entities\Basket;
use app\engine\App;


class ProductController extends Controller
{

    public function actionBuy()
    {
        $idx = App::call()->request->getParams()['idx'];
        $basket = new Basket(session_id(), $idx);
        App::call()->basketRepository->save($basket);
        echo json_encode(['response' => 1]);

    }

    public function actionCatalog()
    {

        $products = App::call()->productRepository->getAll();

        echo json_encode(['goods' => $products], JSON_NUMERIC_CHECK);
    }

    public function actionIndex()
    {

        echo $this->render('catalog', [
            'products' => App::call()->productRepository->getAll()
        ]);
    }


    public function actionCard()
    {

        $idx = App::call()->request->getParams()['idx'];
        $product = App::call()->productRepository->getOne($idx);
        if (!$product) {
            throw new \Exception('Продукт не найден', 401);
        };
        echo $this->render('card', [
            'product' => $product

        ]);
    }


}