<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>
    <div class="container payment-container">
        <h1 class="mt-5">Payment</h1>
        <p>Enter your personal information and click on confirm.</p>
        
        <form action="/payment/confirm" method="POST">
            <div class="form-group mb-2 col-12 col-md-6">
                <label for="emailInput">Enter email:</label>

                <?php if (!isset($_SESSION['logged_User'])) { ?>
                    <input type="email" class="form-control" name="emailInput" placeholder="name@example.com" required>
                <?php } else { ?>
                    <input type="email" class="form-control" name="emailInput" value=<?php echo $model->email; ?> required>
                <?php } ?>
            </div>
            
            <div class="form-group col-12 col-md-6">
                <label for="addresInput">Enter address:</label>
                
                <!-- not logged in is empty form, logged in is filled form -->
                <?php if (!isset($_SESSION['logged_User'])) { ?>
                    <input type="text" class="form-control" name="addresInput" placeholder="Address..." required>
                <?php } else { ?>
                    <input type="text" class="form-control" name="addresInput" value=<?php echo $model->address; ?> required>
                <?php } ?>
            </div>

            <!-- Subtotal and confirmation button -->
            <p class="mt-5"><b>Your subtotal: </b><?php echo $_GET['subtotal'] ?></p>
            <button name="submit" class="btn btn-lg btn-primary btn-block mt-2" type="submit">Confirm</button>
        </form>
    </div>
</body>