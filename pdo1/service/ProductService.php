<?php
namespace MyApp\Service;

include './models/Product.php';

use \PDO;
use \PDOException;
use MyApp\Models\Product;

class ProductService{
    private $conn;
    public function __construct()
    {
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=php_products', "root", "Raisingthebar123!!/");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        
    }
    public function getProducts(){
        try{
            $sql = "SELECT * FROM products";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            echo "Lỗi đọc sản phẩm: " . $e->getMessage();
            return [];
        }
    }

    public function saveProduct($product){
        try{
            $sql = "INSERT INTO products(`name`, `description`, `price`) VALUES (:pName, :pDescription, :pPrice)";

            $stmt = $this->conn->prepare($sql);
            $description = $product->getDescription();
            $price = $product->getPrice();

            $stmt->bindValue(':pName', $product->getName());
            $stmt->bindParam(':pDescription', $description);
            $stmt->bindParam(':pPrice', $price);
    
            $stmt->execute();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }

    public function findProductById($id){
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
    public function updateProductById($id, Product $productUpdate){
        $sql = "UPDATE `products` SET `name` = :name, `description` = :description, `price` = :price WHERE (`id` = :id);";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':name', $productUpdate->getName());
        $stmt->bindValue(':description', $productUpdate->getDescription());
        $stmt->bindValue(':price', $productUpdate->getPrice());
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 
    }

    public function deleteProductById($id){
        try{
            $sql = "DELETE FROM products WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
       
    }

}


?>