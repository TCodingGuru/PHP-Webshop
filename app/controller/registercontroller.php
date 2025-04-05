<?php
require __DIR__ . '/../service/loginservice.php';

class RegisterController
{
    private $loginService;

    function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function index()
    {
        require __DIR__ . '/../view/register/index.php';
    }

    public function validate()
    {
        
        if (isset($_POST['submit'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // <-- filter POST
            
            
            $email = $_POST['inputEmail'];
            $password =  password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
           
            // check user existence with email and password
            $count = $this->loginService->validateCredentials($email, $password);

            // when user exists, set session var and go to home
            if ($count == 1) {
                $_SESSION['logged_User'] = $email;
                $_SESSION['role'] = $this->getUser($email)->role;
                header('Location: /');
            } else { // give error
                header('location: /login?error=failedtologin');
            }
        }
    }

    public function getUser($userEmail) {
        return $this->loginService->getUser($userEmail);
    }

    public function logout()
    {
        unset($_SESSION['logged_User']);
        header('Location: /');
    }
}
