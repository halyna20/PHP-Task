<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Services/CartService.php';

$received_data = json_decode(file_get_contents("php://input"));
$cart = new CartService();
if ($received_data->action === 'addCart') {
    $sum = $cart->addCartList($received_data->id);
    header('Content-type: application/json');
    echo json_encode($sum);
}

if ($received_data->action === 'updateCart') {
    $cartList = $cart->getCartList();
    header('Content-type: application/json');
    echo json_encode($cartList);
}

if ($received_data->action === 'deleteProduct') {
    $deleteProduct = $cart->deleteProductCart($received_data->id);
    $output = [];
    if ($deleteProduct >= 0) {
        $output = array('message' => 'Product deleted');
    } else {
        $output = array('message' => 'Error');
    }

    $output["count"] = $deleteProduct;
    header('Content-type: application/json');
    echo json_encode($output);
}
