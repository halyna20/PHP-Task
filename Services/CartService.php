<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/Repositories/ProductRepository.php";

class CartService
{
    public function addCartList($id)
    {
        $obj = new ProductRepository();
        $findProduct = $obj->getProductById($id);
        $product = mysqli_fetch_assoc($findProduct);
        if ($product["count"] > 0) {
            //when the basket already contains product
            if (isset($_COOKIE['cart'])) {
                $cartProducts = json_decode($_COOKIE['cart'], true);

                $issetProduct = 0;
                for ($i = 0; $i < count($cartProducts['cart']); $i++) {
                    if ($cartProducts["cart"][$i]["product_id"] === $product["productId"]) {
                        if ($cartProducts["cart"][$i]["count"] < $product["count"]) {
                            $cartProducts["cart"][$i]["count"]++;
                            $issetProduct = 1;
                        } else {
                            return ["message" => "The quantity of product in the cart is maximum"];
                        }
                    }
                }

                if ($issetProduct != 1) {
                    $cartProducts['cart'][] = [
                        "product_id" => $product['productId'],
                        "count" => 1
                    ];
                }
            } else {
                $cartProducts = ['cart' => [
                    [
                        "product_id" => $product['productId'],
                        "count" => 1
                    ]
                ]];
            }


            $jsonProduct = json_encode($cartProducts);
            setcookie("cart", "", 0, "/");
            setcookie('cart', $jsonProduct, time() + 60 * 60, "/");

            $countProduct = $this->getSumQuantityProduct($cartProducts);

            setcookie("numberProducts", $countProduct, time() + 60 * 60, "/");

            return ["count" => $countProduct, "message" => "Product added"];
        } else {
            return ["message" => "Product not found"];
        }
    }

    public function getSumQuantityProduct($cartProducts)
    {
        $sum = 0;
        for ($i = 0; $i < count($cartProducts['cart']); $i++) {
            $sum = $sum + $cartProducts['cart'][$i]["count"];
        }

        return $sum;
    }

    public function getCartList()
    {
        $obj = new ProductRepository();
        $data = [];
        if (isset($_COOKIE['cart'])) {
            $cartProducts = json_decode($_COOKIE['cart'], true);

            for ($i = 0; $i < count($cartProducts["cart"]); $i++) {
                $findProduct = $obj->getProductById($cartProducts["cart"][$i]["product_id"]);
                $product = mysqli_fetch_assoc($findProduct);
                $data[] = ['product' => $product, 'countInCart' => $cartProducts['cart'][$i]['count']];
            }
        }
        return $data;
    }

    public function deleteProductCart($id)
    {
        if (isset($_COOKIE['cart'])) {
            $cartProducts = json_decode($_COOKIE['cart'], true);
            for ($i = 0; $i < count($cartProducts['cart']); $i++) {
                if ($cartProducts['cart'][$i]['product_id'] == $id) {
                    if (isset($_COOKIE["numberProducts"])) {
                        $countProducts = json_decode($_COOKIE["numberProducts"]);
                        $countProducts  = $countProducts - $cartProducts['cart'][$i]["count"];
                        setcookie("numberProducts", $countProducts, time() + 60 * 60, "/");
                    }

                    unset($cartProducts['cart'][$i]);
                    sort($cartProducts['cart']);
                }
            }

            $jsonProduct = json_encode($cartProducts);
            setcookie("cart", "", 0, "/");
            setcookie("cart", $jsonProduct, time() + 60 * 60, "/");


            return $countProducts;
        }
    }
}
