<?php

namespace App\Models\ProductTypes;

include_once "config/autoload.php";
use App\Models\Product;

class Dvd extends Product
{
    private $size;

    public function setValue(array $params)
    {
        $errorsArr = array();

        if ($params['size'] < 0) {
            array_push($errorsArr, "the size field is required!");
        }
        elseif (!is_int(json_decode($params['size']))) {
            array_push($errorsArr, "the size field must be of type integer!");
        }

        if ($errorsArr) {
            return array('errors' => $errorsArr);
        }

        $this->sku = $params["sku"];
        $this->name = $params["name"];
        $this->price = $params["price"];
        $this->productType = $params["productType"];
        $this->size = $params["size"];

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