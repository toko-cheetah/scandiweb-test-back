<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "config/autoload.php";
use App\Controllers\ProductController;

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {   
    $data = new ProductController;
    $data->delete();
}
