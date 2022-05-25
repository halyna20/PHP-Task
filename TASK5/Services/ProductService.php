<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/Repositories/ProductRepository.php";

class ProductService
{
    public function getProductList()
    {
        $product = new ProductRepository();
        $productList = $product->getAllProducts();
        return $productList;
    }

    public function getFavoriteList()
    {
        $product = new ProductRepository();
        $favoriteList = $product->getFavoriteProducts();
        return $favoriteList;
    }

    public function addFavoriteProduct($id)
    {
        $product = new ProductRepository();
        $findProduct = $product->getProductById($id);
        $arrProduct = mysqli_fetch_assoc($findProduct);
        if ($arrProduct['is_favorite'] == 0) {
            $favoriteProduct = $product->updateFavoriteProduct($id);
            if ($favoriteProduct) {
                if (isset($_COOKIE["numberFavorite"])) {
                    $countFavorite = json_decode($_COOKIE["numberFavorite"]);
                    $countFavorite = $countFavorite + 1;
                } else {
                    $countFavorite = 1;
                }
                setcookie("numberFavorite", $countFavorite, time() + 60 * 60, "/");
            }
        }
        return $countFavorite;
    }

    public function deleteFavoriteProduct($id)
    {
        $product = new ProductRepository();
        $removeFavProduct = $product->removeFavoriteProduct($id);
        if ($removeFavProduct) {
            if (isset($_COOKIE["numberFavorite"])) {
                $countFavorite = json_decode($_COOKIE["numberFavorite"]);
                $countFavorite = $countFavorite - 1;
                setcookie("numberFavorite", $countFavorite, time() + 60 * 60, "/");
            }
        }
        return $countFavorite;
    }
}
