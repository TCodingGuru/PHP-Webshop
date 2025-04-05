<?php
require __DIR__ . '/../../service/cartservice.php';

class CartController
{

    private $cartService;

    // initialize services
    function __construct()
    {
        $this->cartService = new CartService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            $json = file_get_contents('php://input');
            $obj = json_decode($json);
            $this->cartService->addToCart($obj->id, $obj->quantity);
        }
    }
}