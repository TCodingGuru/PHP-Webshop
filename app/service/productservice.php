<?php
require __DIR__ . '/../repositories/productrepository.php';

class ProductService {
    public function getAll() {
        
        $repository = new ProductRepository();
        return $repository->getAll();
    }

    public function getById($id) {
        
        $repository = new ProductRepository();
        return $repository->getById($id);
    }

    public function getByType($type) {
        
        $repository = new ProductRepository();
        return $repository->getByType($type);
    }
}
?>