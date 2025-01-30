<?php
require __DIR__ . '/../../service/productservice.php';

class ProductController {
    private $productService;

    // initialize services
    function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $products = $this->productService->getAll(); // <-- get products
            header('Content-Type: application/json');
            echo json_encode($products); // <-- echo to browser
        }
    }

    public function index_Filtered() {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $products = $this->productService->getByType($_GET['type']); // <-- get products
            echo json_encode($products); // <-- echo to browser
        }
    }

    public function detail() {
        $product = $this->productService->getById($_GET['id']); // <-- get products
        echo json_encode($product); // <-- echo to browser
    }
}
