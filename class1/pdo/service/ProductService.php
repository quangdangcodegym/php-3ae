<?php

namespace Service;

include '../model/Product.php';
include '../utils/JsonUtils.php';
include '../dao/ProductDao.php';

use  Models\Product;
use Utils\JsonUtils;
use Dao\ProductDao;

class ProductService {

    private ProductDao $productDao;

    public function __construct(){
            $this->productDao = new ProductDao("localhost:3306", "php_products", "root", "Raisingthebar123!!/");
    }
    public function addProduct(Product $product){
            $this->productDao->addProduct($product);
    }
    public function getProducts(){
            return $this->productDao->getProducts();
    }

    /**
    public function getProductById($id){
        $products = $this->getProducts();
        foreach($products as $product){
            if($product->getId() == $id){
                return $product;
            }
        }
        return null;

    }

    public function updateProduct($id, Product $product){
        $products  = $this->getProducts();
        foreach($products as $key => $item){
            if($item->getId() == $id){
                $item->setName($product->getName());
                $item->setDescription($product->getDescription());
                $item->setPrice($product->getPrice());
                break;
            }
        }
        $this->jsonUtils->saveData($products, pathProducts);
    }

    public function deleteProduct($id){
        $products = $this->getProducts();

        foreach($products as $key => $item){
            if($item->getId() == $id){
                unset($products[$key]);
                break;
            }
        }
        $this->jsonUtils->saveData($products, pathProducts);
    }

     */
}

?>