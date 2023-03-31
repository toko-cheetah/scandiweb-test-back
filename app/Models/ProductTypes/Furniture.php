<?php

namespace App\Models\ProductTypes;

include_once "config/autoload.php";
use App\Models\Product;

class Furniture extends Product
{
    public $height, $width, $length;

    public function __construct(array $params = array())
    {
        parent::__construct();
        
        $this->sku = $params["sku"] ?? null;
        $this->name = $params["name"] ?? null;
        $this->price = $params["price"] ?? null;
        $this->productType = $params["productType"] ?? null;
        $this->height = $params["height"] ?? null;
        $this->width = $params["width"] ?? null;
        $this->length = $params["length"] ?? null;
    }

    public function setValue()
    {
        $sql = "INSERT INTO products (sku, name, price, productType, height, width, length) 
        VALUES (
            '$this->sku',
            '$this->name',
            '$this->price',
            '$this->productType',
            '$this->height',
            '$this->width',
            '$this->length' 
        )";

        return $this->database->query($sql);
    }
}