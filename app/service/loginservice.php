<?php
require __DIR__ . '/../repositories/loginrepository.php';

class LoginService {
    public function validateCredentials($email, $password) {
        $repositoy = new LoginRepository();
        return $repositoy->validateCredentials($email, $password);
    }

    public function getUser($userEmail) {
        $repository = new LoginRepository();
        return $repository->getUser($userEmail);
    }
}