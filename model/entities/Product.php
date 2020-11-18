<?php
namespace app\model\entities;


class Product extends DataEntity
{
    public $idx;
    public $name;
    public $description;
    public $price;


    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}