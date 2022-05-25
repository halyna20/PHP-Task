<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php";
?>
<?php
class ProductRepository
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProducts()
    {

        $query = "SELECT * FROM products ORDER BY productId ";
        try {
            $result = $this->db->select($query);
            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getProductById($id)
    {
        $query = "SELECT * FROM products WHERE productId=" . $id;
        try {
            $result = $this->db->select($query);
            return $result;
        } catch (Exception $e) {
            echo 'Product not found: ' . $e->getMessage();
        }
    }

    public function getFavoriteProducts()
    {
        $query = "SELECT * FROM products WHERE `is_favorite` = '1' ORDER BY productId DESC";
        try {
            $result = $this->db->select($query);
            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateFavoriteProduct($id)
    {
        $query = "UPDATE products SET`is_favorite` = '1' WHERE `productId` = " . $id;
        try {
            $result = $this->db->update($query);
            return $result;
        } catch (Exception $e) {
            echo 'Update error: ' . $e->getMessage();
        }
    }

    public function removeFavoriteProduct($id)
    {
        $query = "UPDATE products SET`is_favorite` = '0' WHERE `productId` = " . $id;
        try {
            $result = $this->db->update($query);
            return $result;
        } catch (Exception $e) {
            echo 'Delete error: ' . $e->getMessage();
        }
    }
}
?>