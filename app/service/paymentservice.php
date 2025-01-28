<?php

require __DIR__ . '/../repositories/paymentrepository.php';

class PaymentService
{

    public function getUser($userEmail) {
        
        // create new repo, call method
        $repository = new PaymentRepository();
        return $repository->getUser($userEmail);
    }
}
