<?php

require __DIR__ . '/../repositories/paymentrepository.php';

class PaymentService
{

    public function getUser($userEmail) {
        $repository = new PaymentRepository();
        return $repository->getUser($userEmail);
    }
}
