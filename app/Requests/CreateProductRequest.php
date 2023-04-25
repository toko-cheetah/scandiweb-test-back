<?php

namespace App\Requests;

include_once "config/autoload.php";
include_once "config/constants.php";
use Database\Database;

class CreateProductRequest
{
    private $database;

    public function __construct()
    {
        $this->database = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    }

    public function validate(array $request)
    {
        $errorsArr = array();
        $testedRequest = array();

        foreach($request as $key => $value){
            $testedRequest[$key] = $this->testInput($value);
        }

        $sql = "SELECT sku from products WHERE sku = '" . $testedRequest['sku'] . "'";
        $result = $this->database->query($sql);

        if ($result->num_rows) {
            array_push($errorsArr, "a product with this 'sku' already exists!");
        }

        foreach (array('sku', 'name', 'productType') as $key) {
            if (!$testedRequest[$key]) {
                array_push($errorsArr, "the $key field is required!");
            }
        }

        if ($testedRequest['price'] < 0) {
            array_push($errorsArr, "the price field is required!");
        }
        elseif (!is_numeric(json_decode($testedRequest['price']))) {
            array_push($errorsArr, "the price field must be of type float!");
        }

        if (!preg_match("/book|dvd|furniture/i", $testedRequest['productType'])) {
            array_push($errorsArr, "the productType field must be: 'Book', 'DVD', or 'Furniture'!");
        }

        return array('errors' => $errorsArr, 'testedRequest' => $testedRequest);
    }

    private function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
}