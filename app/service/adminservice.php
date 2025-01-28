<?php

require __DIR__ . '/../repositories/adminrepository.php';

class AdminService {
    
    public function getAll() {
        $repository = new AdminRepository();
        return $repository->getAll();
    }

    // insert new product
    public function insert($productName, $productDescription, $productPrice, $productType) {
        $repository = new AdminRepository();
        $repository->insert($productName, $productDescription, $productPrice, $productType);
    }

    // edit product
    public function update($product_id, $productName, $productDescription, $productPrice, $productType) {
        $repository = new AdminRepository();
        $repository->update($product_id, $productName, $productDescription, $productPrice, $productType);
    }

    // delete product
    public function delete($product_id) {
        $repository = new AdminRepository();
        $repository->delete($product_id);
    }
}