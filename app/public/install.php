<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../dbconfig.php';
try {
    $db = new Database($type, $servername, $username, $password, $database);
    $connection = $db->getConnection();
    $seeder = new Seeder($connection);
    $seeder->run();
} catch (Exception $e) {
    echo "Error during seeding process: " . $e->getMessage();
}
unlink(__FILE__);