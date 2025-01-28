<?php

require __DIR__ . '/../service/productservice.php';

class ProductController{
    private $productService;

    function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index() {
        require __DIR__ . '/../view/product/index.php';
    }

    public function detail() {
        require __DIR__ . '/../view/product/detail.php';
    }
}
