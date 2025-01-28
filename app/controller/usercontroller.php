<?php

require __DIR__ . '/../service/userservice.php';

class UserController {

    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function insert() {
        if (isset($_POST['inputName'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW); // <-- filter POST

            // check all post variables and put them into vars
            if (isset($_POST['inputName'])) {
                $userName = $_POST['inputName'];
            }

            if (isset($_POST['inputEmail'])) {
                $userEmail = $_POST['inputEmail'];
            }

            if (isset($_POST['inputAddress'])) {
                $userAddress = $_POST['inputAddress'];
            }

            if (isset($_POST['inputPassword'])) {
                $userPassword = $_POST['inputPassword'];
            }

            // if all are present, add user
            if (!empty($userName) && !empty($userEmail) && !empty($userAddress) && !empty($userPassword)) {
                $this->userService->insert($userName, $userEmail, $userAddress, $userPassword);
                header("Location: /");
            }
        }
        else {
            header("Location: /?error=registrationfailed"); // <-- else give error in url
        }
    }
}