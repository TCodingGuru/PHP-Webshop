<?php

require __DIR__ . '/../service/paymentservice.php';

class PaymentController
{
    private $paymentService;

    function __construct()
    {
        $this->paymentService = new PaymentService();
    }

    public function index()
    {
        // if logged user exists, show page with user model, else show empty page
        if (isset($_SESSION['logged_User'])) {
            $model = $this->paymentService->getUser($_SESSION['logged_User']);
            require __DIR__ . '/../view/payment/index.php';
        } else {
            require __DIR__ . '/../view/payment/index.php';
        }
    }


    public function confirm()
    {

        // check for POST var
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // get vars
            $email = $_POST['emailInput'];
            $address = $_POST['addresInput'];

            unset($_SESSION['cart']);
            header('Location: /');
        }
    }
}
