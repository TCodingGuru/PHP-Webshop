<?php

require __DIR__ . '/../model/product.php';
require __DIR__ . '/repository.php';

class CartRepository extends Repository
{

    public function getAll($cart_products)
    {
        try {
            if (empty($cart_products)) {
                return []; // No products to fetch
            }

            $product_ids = array_keys($cart_products); // Explicitly get product IDs
            $placeholders = implode(',', array_fill(0, count($product_ids), '?'));

            $sqlquery = "SELECT id, name, description, price, type FROM products WHERE id IN ($placeholders)";
            $stmt = $this->connection->prepare($sqlquery);

            foreach ($product_ids as $index => $id) {
                $stmt->bindValue($index + 1, $id, PDO::PARAM_INT);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log the error instead of showing it to the user
            error_log("Database error in getAll(): " . $e->getMessage());
            return []; // Return empty array on error
        }
    }
    function addToCart($product_id, $quantity)
    {
        $sqlQuery = "SELECT id, name, description, price, type FROM products WHERE id=:id";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindParam(':id', $product_id);

        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($product && $quantity > 0) {

            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {

                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    $_SESSION['cart'][$product_id] += $quantity;
                } else {
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
                $_SESSION['cart'] = array($product_id => $quantity);
            }
        }
    }
}
