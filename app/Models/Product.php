<?php

namespace App\Models;

include_once "config/autoload.php";
include_once "config/constants.php";
use Database\Database;

abstract class Product
{
    public $sku, $name, $price, $productType;
    
    protected $database;

    public function __construct()
    {
        $this->database = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    }
    
    public function getValues()
    {
        $sql = "SELECT * FROM products";        
        $result = $this->database->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function deleteValues(string $ids)
    {
        $sql = "DELETE FROM products WHERE id IN ($ids)";
        return $this->database->query($sql);
    }

    abstract protected function setValue();
}