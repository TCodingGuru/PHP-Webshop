<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="/css/styles.css">
<link rel="stylesheet" href="/css/styles.css">

    <div class="container mt-5">
        <h1 class="mb-3">Our products:</h1>
        <div class="container-fluid content-row">
            <!-- Choose a type to filter on -->
            <select class="mb-2" id="dropdown" onchange="filterProducts()">
                <option value="default">Select a type</option>
                <option value="Motherboard">Motherboard</option>
                <option value="CPU">CPU</option>
                <option value="SSD">SSD</option>
            </select>
            <!-- Cards for displaying products will go here -->
            <div id="row" class="row"></div>
        </div>

        <!-- External JavaScript file for product filtering and display -->
        <script src="/javascript/product_page.js"></script>
    </div>
</body>
</html>