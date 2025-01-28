<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../model/user.php';

class LoginRepository extends Repository
{

    function validateCredentials($email, $password)
    {
        try {

            // count users with given email and password
            $sqlquery = "SELECT COUNT(id) FROM users WHERE email=:email AND password=:password";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params to stmt
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $stmt->execute();
            $rowCount = $stmt->fetchColumn();

            return $rowCount; // <-- return count
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function getUser($userEmail) {
        
        // get user from database
        try {
            $sqlquery = "SELECT id, name, email, address, role, password FROM users WHERE email=:email";
            $stmt = $this->connection->prepare($sqlquery);

            $stmt->bindParam(':email', $userEmail);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
