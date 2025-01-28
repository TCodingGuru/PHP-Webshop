<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../model/product.php';

class AdminRepository extends Repository {
    
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
    
    public function insert($productName, $productDescription, $productPrice, $productType) {
        
        // insert new product into db
        try {
            $sqlquery = "INSERT INTO products (name, description, price, type) VALUES(:name, :description, :price, :type)";
            $stmt = $this->connection->prepare($sqlquery);
            
            // bind param to stmt
            $stmt->bindParam(':name', $productName);
            $stmt->bindParam(':description', $productDescription);
            $stmt->bindParam(':price', $productPrice);
            $stmt->bindParam(':type', $productType);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function update($product_id, $productName, $productDescription, $productPrice, $productType) {
        
        // Update product in the db
        try {
            $sqlquery = "UPDATE products SET name=:name, description=:description, price=:price, type=:type WHERE id=:id";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params to stmt
            $stmt->bindParam(':name',$productName);
            $stmt->bindParam(':description', $productDescription);
            $stmt->bindParam(':price', $productPrice);
            $stmt->bindParam(':id', $product_id);
            $stmt->bindParam(':type', $productType);

            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function delete($product_id) {

        // delete product from database
        try {
            $sqlquery = "DELETE FROM products WHERE id = :id";
            $stmt = $this->connection->prepare($sqlquery);

            // bind param
            $stmt->bindParam('id', $product_id);
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }
}