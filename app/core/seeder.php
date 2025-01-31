<?php

class Seeder
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createTables()
    {
        try {
            $this->connection->query("CREATE TABLE IF NOT EXISTS products (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(50) NOT NULL,
                description VARCHAR(1000) NOT NULL,
                price INT NOT NULL,
                type VARCHAR(30) NOT NULL
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        } catch (PDOException $e) {
            echo "Query failed (products table creation): " . $e->getMessage();
        }

        try {
            $this->connection->query("CREATE TABLE IF NOT EXISTS users (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                address VARCHAR(30) NOT NULL,
                role VARCHAR(20) NOT NULL,
                password VARCHAR(30) NOT NULL
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        } catch (PDOException $e) {
            echo "Query failed (users table creation): " . $e->getMessage();
        }
    }

    // Method to insert default products if the table is empty
    public function seedProducts()
    {
        try {
            $this->connection->query("INSERT INTO products (name, description, price, type) VALUES
            ('B450 Aorus Elite V2', 'AMD B450 AORUS Motherboard with 8+2 Phases Digital Twin Power Design, Dual M.2 with One Thermal Guard, GIGABYTE Gaming LAN with Bandwidth Management, RGB FUSION 2.0, CEC 2019 Ready.', 100, 'Motherboard'),
            ('AMD Ryzen 7 X5800', 'AMD Ryzen™ 7 5800X Desktop Processor, 8 core, 16 thread and Max. Boost Clock Up to 4.7GHz.', 500, 'CPU'),
            ('SSD 980', 'Samsung SSD 980 Pro 1TB heatsink.', 999, 'SSD')");
        } catch (PDOException $e) {
            echo "Query failed (products seeding): " . $e->getMessage();
        }
    }

    // Method to insert default users if the table is empty
    public function seedUsers()
    {
        try {
            $this->connection->query("INSERT INTO users (name, email, address, role, password) VALUES
            ('Gilberto Seedorf', 'test@email.com', 'Haarlem123', 'user', 'wachtwoord'),
            ('Mark de Haan', 'mark@mail.com', 'Haarlem 1234', 'admin', 'wachtwoord')");
        } catch (PDOException $e) {
            echo "Query failed (users seeding): " . $e->getMessage();
        }
    }
    public function alterTables()
    {
        // Alter the products table to add the primary key and set the auto_increment
        try {
            $this->connection->query("ALTER TABLE products
                ADD PRIMARY KEY (id),
                MODIFY id INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12");
        } catch (PDOException $e) {
            echo "Query failed (altering products table): " . $e->getMessage();
        }

        // Alter the users table to add the primary key and set the auto_increment
        try {
            $this->connection->query("ALTER TABLE users
                ADD PRIMARY KEY (id),
                MODIFY id INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6");
        } catch (PDOException $e) {
            echo "Query failed (altering users table): " . $e->getMessage();
        }
    }

    public function run()
    {
        $this->createTables();
        $this->seedProducts();
        $this->seedUsers();
        $this->alterTables();
    }
}
