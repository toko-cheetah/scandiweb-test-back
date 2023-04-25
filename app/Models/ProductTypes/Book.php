<?php

namespace App\Models\ProductTypes;

include_once "config/autoload.php";
use App\Models\Product;

class Book extends Product
{
    private $weight;

    public function setValue(array $params)
    {
        $errorsArr = array();

        if ($params['weight'] < 0) {
            array_push($errorsArr, "the weight field is required!");
        } 
        elseif (!is_int(json_decode($params['weight']))) {
            array_push($errorsArr, "the weight field must be of type integer!");
        }

        if ($errorsArr) {
            return array('errors' => $errorsArr);
        }

        $this->sku = $params["sku"];
        $this->name = $params["name"];
        $this->price = $params["price"];
        $this->productType = $params["productType"];
        $this->weight = $params["weight"];
        
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