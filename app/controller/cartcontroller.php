<?php

require __DIR__ . '/../service/cartservice.php';

class CartController
{
    private $cartService;

    function __construct()
    {
        $this->cartService = new CartService();
    }

    public function index()
    {
        // if session var exists, cart_products is session var, otherwise a array
        $cart_products = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

        // if session var then show cart products
        if ($cart_products) {
            $model = $this->cartService->getAll($cart_products);
        }
        else { // else show empty array
            $model = array();
        }

        require __DIR__ . '/../view/cart/index.php';
    }

    public function addToCart()
    {

        // validate POST id and quantity
        if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
            
            // get vars and call method
            $product_id = (int)$_POST['product_id'];
            $quantity = (int)$_POST['quantity'];
            $this->cartService->addToCart($product_id, $quantity);
        }
        header('location: /product');
    }

    public function removeFromCart() 
    {
        // validate GET id, existence of session var and session var value
        if (isset($_GET['delete']) && is_numeric($_GET['delete']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['delete']])){
            unset($_SESSION['cart'][$_GET['delete']]); // <-- unset var
        }
        header('Location: /cart');
    }
}
