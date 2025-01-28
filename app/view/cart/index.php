<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>
    <div class="container border mt-5">
        <div class="container cart-header">
            <h1>Your cart:</h1>
        </div>
        <div class="container cart-body">
            <table class="table">
                <thead>
                    
                <!-- Table head row -->
                <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Nr</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <!-- foreach product, enter values into table -->
                    <?php
                    $subtotal = 0;
                    foreach ($model ?? [] as $product) : ?>
                        <tr>
                            <th scope="row"><?php echo $product['name'] ?></th>
                            <td><?php echo $product['price'] ?></td>
                            <td><?php echo $_SESSION['cart'][$product['id']] ?></td>
                            <td><a class="btn btn-danger" href="/cart/removeFromCart?delete=<?php echo $product['id'] ?>" role="button">Delete</a></td>
                        </tr> 
                        <?php 
                            $price_total_quantity = $_SESSION['cart'][$product['id']] * $product['price']; // <-- calc subtotal,  keep quantity in mind
                            $subtotal += $price_total_quantity;
                        ?>
                    <?php endforeach; ?>

                    <!-- Empty row -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                    <!-- subtotal row with payment button -->
                    <tr>
                        <td>Subtotal:</td>
                        <td><?php echo $subtotal;?></td>
                        <td></td>
                        <td><a class="btn btn-primary" href="/payment?subtotal=<?php echo $subtotal;?>" role="button">Buy</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>