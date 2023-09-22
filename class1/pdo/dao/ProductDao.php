<?php
namespace Dao;
use \PDO;
use \PDOException;

class ProductDao {
    private $pdo;
    public function __construct($host, $dbname, $username, $password)
    {   
        try{
            //mysql:host=$host;dbname=$dbname;charset=utf8
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo "Kết nối không thành công: " . $e->getMessage();
        }
    }
    public function addProduct($product){
        try{
            $sql = "INSERT INTO products (name, description, price) VALUES (:name, :description, :price)";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":name", $product->getName());
            $stmt->bindParam(':description', $product->getDescription());
            $stmt->bindParam(":price", $product->getPrice());
            $stmt->execute();

        }catch(PDOException $e){
            echo "Lỗi thêm sản phẩm: " . $e->getMessage();
            return false;
        }
    }

    public function getProducts(){
        try{
            $sql = "SELECT * FROM products";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            echo "Lỗi đọc sản phẩm: " . $e->getMessage();
            return [];
        }
    }
    /**

    public function updateUser($id, $name, $email) {
        try {
            $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi cập nhật người dùng: " . $e->getMessage();
            return false;
        }
    }

    public function updateProduct($id, $product){
        try{

        }catch(PDOException $e){

        }
    }

    public function deleteUser($id) {
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi xóa người dùng: " . $e->getMessage();
            return false;
        }
    }

     */
}


?>