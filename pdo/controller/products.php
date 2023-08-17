<?php

include_once "../service/ProductService.php";
include_once "../model/Product.php";

use Models\Product;

use Service\ProductService;

    class ProductController{

        private static $instance = null;
        

        private $productService;
        public function __construct(){
            $this->productService = new ProductService();
        }
        public function getAll(){

        }
        public function showAdd(){
            $products = $this->productService->getProducts();
            include "../view/add.php";
        }
        public function handleRequest(){
            switch($_SERVER['REQUEST_METHOD'])
            {
                case 'GET': 
                    $this->handleGetRequest();
                    break;
                case 'POST': 
                    $this->handlePostRequest();
                    break;
            }
        }
        public function handleGetRequest(){
            $action =  "";
            if(isset($_GET['action'])){
                $action = $_REQUEST['action'];
            }
            switch ($action) {
                case 'add':
                    $this->showAdd();
                    break;
                case 'edit':
                    $this->showEdit();
                    break;
                case 'delete':
                    $this->deleteProduct();
                    break;
                default:
                    $this->showProducts();
                    break;
            }
        }
        public function handlePostRequest(){
            $action =  "";
            if(isset($_GET['action'])){
                $action = $_REQUEST['action'];
            }
            switch ($action) {
                case 'add':
                    $this->saveProduct();
                    break;
                case 'edit':
                    $this->updateProduct();
                    break;
                default:
                    $this->getAll();
                    break;
            }
        }
        public function saveProduct(){
            $name = $_POST['name-product'];
            $description = $_POST['description-product'];
            $price = $_POST['price-product'];

            $maxId = $this->productService->getMaxId();

            $product = new Product($maxId + 1, $name, $description, $price);
            $this->productService->addProduct($product);

            $products = $this->productService->getProducts();
            include '../view/index.php';
        }
        public function showProducts(){
            $products = $this->productService->getProducts();
            include "../view/index.php";
        }
        public function showEdit(){
            $id = $_GET['id'];
            $product = $this->productService->getProductById($id);

            include "../view/edit.php";
        }

        public function updateProduct(){
            $name = $_POST['name-product'];
            $description = $_POST['description-product'];
            $price = $_POST['price-product'];
            $id = $_REQUEST['id'];

            
            $productUpdate = new Product($id, $name, $description, $price);

            $this->productService->updateProduct($id, $productUpdate);
            $products = $this->productService->getProducts();
            include "../view/index.php";

        }

        public function deleteProduct(){
            $id = $_REQUEST['id'];
            $this->productService->deleteProduct($id);


            $products = $this->productService->getProducts();
            include "../view/index.php";
        }
    }

    $product = new ProductController();
    $product->handleRequest();
?>