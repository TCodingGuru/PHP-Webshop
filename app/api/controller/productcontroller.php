<?php
require __DIR__ . '/../../service/productservice.php';

class ProductController {
    private $productService;

    function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $products = $this->productService->getAll(); 
            header('Content-Type: application/json');
            echo json_encode($products); 
        }
    }

    public function index_Filtered() {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $products = $this->productService->getByType($_GET['type']);
            echo json_encode($products); 
        }
    }

    public function detail() {
        $product = $this->productService->getById($_GET['id']);
        echo json_encode($product);
    }
}
