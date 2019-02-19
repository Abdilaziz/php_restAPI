<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

// read products
$stmt = $product->read();
$num = $stmt->rowCount();

if ( $num > 0 ) {
    $products_arr=array();
    $products_arr["records"]=array();



    http_response_code(200);

    echo json_encode($products_arr);

}
else {
    // 404 - Not Found
    http_response_code(404);

    echo json_encode(
        array("message" => "No products found.")
    );

}


?>