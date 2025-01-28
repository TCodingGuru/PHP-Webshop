<?php 

require __DIR__ . '/repository.php';

class UserRepository extends Repository {
    public function insertUser($userName, $userEmail, $userAddress, $userPassword) {
        $role = "user"; // <- since we are adding only normal users, the default role is user
        
        // insert new user in db
        try {
            $sqlquery = "INSERT INTO users (name, email, address, role, password) VALUES(:name, :email, :address, :role, :password)";
            $stmt = $this->connection->prepare($sqlquery);

            // bind params and execute
            $stmt->bindParam(':name', $userName);
            $stmt->bindParam(':email', $userEmail);
            $stmt->bindParam(':address', $userAddress);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':password', $userPassword);

            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e;
        }
    }
}