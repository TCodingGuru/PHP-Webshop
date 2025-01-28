<?php
require __DIR__ . '/../repositories/loginrepository.php';

class LoginService {
    public function validateCredentials($email, $password) {
        
        // create new repo, call method
        $repositoy = new LoginRepository();
        return $repositoy->validateCredentials($email, $password);
    }

    public function getUser($userEmail) {
        
        // create new repo, call method
        $repository = new LoginRepository();
        return $repository->getUser($userEmail);
    }
}