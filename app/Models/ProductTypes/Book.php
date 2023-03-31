<?php

namespace App\Models\ProductTypes;

include_once "config/autoload.php";
use App\Models\Product;

class Book extends Product
{
    public $weight;

    public function __construct(array $params = array())
    {
        parent::__construct();
        
        $this->sku = $params["sku"] ?? null;
        $this->name = $params["name"] ?? null;
        $this->price = $params["price"] ?? null;
        $this->productType = $params["productType"] ?? null;
        $this->weight = $params["weight"] ?? null;
    }

    public function setValue()
    {
        $sql = "INSERT INTO products (sku, name, price, productType, weight) 
        VALUES (
            '$this->sku', 
            '$this->name', 
            '$this->price', 
            '$this->productType', 
            '$this->weight'
        )";

        return $this->database->query($sql);
    }
}