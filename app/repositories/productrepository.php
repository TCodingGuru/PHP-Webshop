<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../model/product.php';

class ProductRepository extends Repository {
    
    function getAll() {
        
        // get all products
        try {
            $stmt = $this->connection->prepare("SELECT id, name, description, price, type FROM products");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $products = $stmt->fetchAll();
            
            return $products;
            
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getById($id) {
        
        // get product by id
        try {
            $sqlquery = "SELECT id, name, description, price, type FROM products WHERE id=:id";
            $stmt = $this->connection->prepare($sqlquery);
            
            // bind param to stmt
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $product = $stmt->fetch();

            return $product;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getByType($type) {
        
        // get product by type
        try {
            $sqlquery = "SELECT id, name, description, price, type FROM products WHERE type=:type";
            $stmt = $this->connection->prepare($sqlquery);
            
            // bind param to stmt
            $stmt->bindParam(':type', $type);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
            $product = $stmt->fetchAll();

            return $product;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
