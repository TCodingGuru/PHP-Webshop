<?php
require __DIR__ . '/../repositories/productrepository.php';

class ProductService {
    public function getAll() {
        
        // create new repo, call method
        $repository = new ProductRepository();
        return $repository->getAll();
    }

    public function getById($id) {
        
        // create new repo, call method
        $repository = new ProductRepository();
        return $repository->getById($id);
    }

    public function getByType($type) {
        
        // create new repo, call method
        $repository = new ProductRepository();
        return $repository->getByType($type);
    }
}
?>