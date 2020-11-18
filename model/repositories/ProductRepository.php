<?php

namespace app\model\repositories;

use app\model\Repository;
use app\model\entities\Product;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return "products";
    }

    public function getEntityClass()
    {
        return Product::class;
    }

}