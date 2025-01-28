<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../dbconfig.php';

try {
    $connection = new PDO("$type:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

try {
    $connection->query("CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name varchar(50) NOT NULL,
    description varchar(1000) NOT NULL,
    price int NOT NULL,
    type varchar(30) NOT NULL
    )");
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

try {
    $connection->query("CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    address varchar(30) NOT NULL,
    role varchar(20) NOT NULL,
    password varchar(30) NOT NULL
    )");
} catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }


try {
    $connection->query("INSERT INTO products (id, name, description, price, type) VALUES
    (1, 'B450 Aorus Elite V2', 'AMD B450 AORUS Motherboard with 8+2 Phases Digital Twin Power Design, Dual M.2 with One Thermal Guard, GIGABYTE Gaming LAN with Bandwidth Management, RGB FUSION 2.0, CEC 2019 Ready.', 100, 'Motherboard'),
    (2, 'AMD Ryzen 7 X5800', 'AMD Ryzen™ 7 5800X Desktop Processor, 8 core, 16 thread and Max. Boost Clock Up to 4.7GHz.', 500, 'CPU'),
    (3, 'SSD 980', 'Samsung SSD 980 Pro 1TB heatsink.', 999, 'SSD')");

    $connection->query("INSERT INTO users (id, name, email, address, role, password) VALUES
    (3, 'Bram Terlouw', 'test@email.com', 'Slotenmakerstraat 73', 'user', 'wachtwoord'),
    (4, 'Mark de Haan', 'mark@mail.com', 'bakkerstraat 72', 'admin', 'wachtwoord')");

} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

unlink(__FILE__);