<?php
use app\model\Products;
class ProductTest extends  PHPUnit\Framework\TestCase
{
    public function testProduct() {
        $name = "Чай";
        $product = new Products(null, $name, "Китайсий", 22);
        $this->assertEquals($name, $product->name);
    }

}