<?php

namespace App\Models\ProductTypes;

include_once "config/autoload.php";
use App\Models\Product;

class Furniture extends Product
{
    private $height, $width, $length;

    public function setValue(array $params)
    {
        $errorsArr = array();

        foreach (array('height', 'width', 'length') as $key) {
            if ($params[$key] < 0) {
                array_push($errorsArr, "the $key field is required!");
            }
            elseif (!is_int(json_decode($params[$key]))) {
                array_push($errorsArr, "the $key field must be of type integer!");
            }
        }

        if ($errorsArr) {
            return array('errors' => $errorsArr);
        }

        $this->sku = $params["sku"];
        $this->name = $params["name"];
        $this->price = $params["price"];
        $this->productType = $params["productType"];
        $this->height = $params["height"];
        $this->width = $params["width"];
        $this->length = $params["length"];

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