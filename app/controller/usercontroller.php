<?php

require __DIR__ . '/../service/userservice.php';

class UserController {

    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            // Sanitize all input fields
            $postData = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $userName     = $postData['inputName']     ?? null;
            $userEmail    = $postData['inputEmail']    ?? null;
            $userAddress  = $postData['inputAddress']  ?? null;
            $userPassword = $postData['inputPassword'] ?? null;
    
            // Validate that none of the fields are empty
            if ($userName && $userEmail && $userAddress && $userPassword) {
                // Proceed with inserting the user
                $this->userService->insert($userName, $userEmail, $userAddress, $userPassword);
                header("Location: /");
                exit;
            } else {
                // If validation fails, redirect with error
                header("Location: /?error=registrationfailed");
                exit;
            }
        } else {
            // Invalid request method
            header("Location: /?error=invalidrequest");
            exit;
        }
    }
    
}