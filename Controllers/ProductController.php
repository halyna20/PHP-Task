<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Services/ProductService.php';
//get data from the query
$received_data = json_decode(file_get_contents("php://input"));
$data = [];

$product = new ProductService();
if ($received_data->action === 'fetchall') {
    $sql = $product->getProductList();
    while ($row = $sql->fetch_assoc())
        $data[] = $row;
    header('Content-type: application/json');
    echo json_encode($data);
}

if ($received_data->action === 'fetchFavoriteProduct') {
    $favoriteProduct = $product->getFavoriteList();
    if ($favoriteProduct) {
        while ($row = $favoriteProduct->fetch_assoc())
            $data[] = $row;
    }
    header('Content-type: application/json');
    echo json_encode($data);
}

if ($received_data->action === 'deleteFavoriteProduct') {
    $deleteFavProduct = $product->deleteFavoriteProduct($received_data->id);
    $output = [];
    if ($deleteFavProduct >= 0) {
        $output = array('message' => 'Product deleted');
        $output["count"] = $deleteFavProduct;
    } else {
        $output = array('message' => 'Error');
    }
    header('Content-type: application/json');
    echo json_encode($output);
}

if ($received_data->action === 'addFavorite') {
    $favoriteProduct = $product->addFavoriteProduct($received_data->id);
    $output = [];
    if ($favoriteProduct) {
        $output = array('message' => 'Product added');
        $output["count"] = $favoriteProduct;
    } else {
        $output = array('message' => 'The product is already on the list');
    }
    header('Content-type: application/json');
    echo json_encode($output);
}
