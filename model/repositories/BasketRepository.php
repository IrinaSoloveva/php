<?php

namespace app\model\repositories;

use app\model\entities\Basket;
use app\model\Repository;
use app\engine\Db;

class BasketRepository extends Repository
{

    public function getBasket($session) {
        $sql = "SELECT `products`.`idx` as id_prod, `basket`.`idx` as id_basket, `products`.`name`, `products`.`description`, `products`.`price` FROM products,basket WHERE basket.product=products.idx AND basket.session=:session ";
        return $this->db->queryAll($sql, ['session' => $session]);
    }

    public function getCount($session) {
        $sql = "SELECT count(*) as count FROM `basket` WHERE `session` = :session";
        return $this->db->queryOne($sql, ['session' => $session])['count'];
    }

    public function getTableName()
    {
        return "basket";
    }

    public function getEntityClass()
    {
        return Basket::class;
    }
}