<?php

namespace app\model\entities;


class Basket extends DataEntity
{
    public $idx;
    public $session;
    public $product;


    public function __construct($session = null, $product = null)
    {
        $this->session = $session;
        $this->product = $product;
    }


    public function getTableName()
    {
        return "basket";
    }


}