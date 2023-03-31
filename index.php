<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "config/autoload.php";
use App\Controllers\ProductController;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {   
    $data = new ProductController;
    $data->index();
}
