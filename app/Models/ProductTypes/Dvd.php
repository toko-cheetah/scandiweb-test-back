<?php

namespace App\Models\ProductTypes;

include_once "config/autoload.php";
use App\Models\Product;

class Dvd extends Product
{
    public $size;

    public function __construct(array $params = array())
    {
        parent::__construct();
        
        $this->sku = $params["sku"] ?? null;
        $this->name = $params["name"] ?? null;
        $this->price = $params["price"] ?? null;
        $this->productType = $params["productType"] ?? null;
        $this->size = $params["size"] ?? null;
    }

    public function setValue()
    {
        $sql = "INSERT INTO products (sku, name, price, productType, size) 
        VALUES (
            '$this->sku',
            '$this->name',
            '$this->price',
            '$this->productType',
            '$this->size' 
        )";

        return $this->database->query($sql);
    }
}