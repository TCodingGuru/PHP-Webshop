<?php

require __DIR__ . '/../repositories/userrepository.php';

class UserService {
    public function insert($userName, $userEmail, $userAddress, $userPassword){
        $repository = new UserRepository();
        $repository->insertUser($userName, $userEmail, $userAddress, $userPassword);
    }
}