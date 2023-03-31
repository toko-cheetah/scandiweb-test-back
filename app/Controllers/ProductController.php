<?php

namespace App\Controllers;

include_once "config/autoload.php";
use App\Models\ProductTypes\Book;
use App\Requests\CreateProductRequest;

class ProductController
{
    public function index()
    {
        /**
         * instantiate one of the child classes
         * to access the parent abstract class method
         */
        $products = new Book();
        $result = $products->getValues();

        http_response_code(200);
        echo json_encode($result);
    }

    public function create()
    {
        $validation = new CreateProductRequest();
        $validatedRequest = $validation->validate($_REQUEST);

        if ($validatedRequest['errors']) {
            http_response_code(400);
            echo json_encode($validatedRequest['errors']);
        } else {            
            $productType = $validatedRequest['testedRequest']['productType'];
            
            $className = "App\Models\ProductTypes\\$productType";
            
            $obj = new $className($validatedRequest['testedRequest']);
            $result =  $obj->setValue();
            
            if ($result) {
                http_response_code(201);
                echo json_encode('data created!');
            }
        }
    }

    public function delete()
    {   
        $str = htmlspecialchars($_GET['ids']);

        /**
         * instantiate one of the child classes
         * to access the parent abstract class method
         */
        $products = new Book();
        $result = $products->deleteValues($str);
        
        if ($result) {
            http_response_code(204);
        };
    }
}
