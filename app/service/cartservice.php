<?php

require __DIR__ . '/../repositories/cartrepository.php';

Class CartService {
    
    public function getAll($cart_products){
        
        // create new repo, call method
        $repository = new CartRepository();
        return $repository->getAll($cart_products);
    }

    public function addToCart($product_id, $quantity) {
        
        // create new repo, call method
        $repository = new CartRepository();
        $repository->addToCart($product_id, $quantity);
    }
}