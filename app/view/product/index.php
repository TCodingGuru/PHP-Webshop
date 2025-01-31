<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>
    <div class="container mt-5">
        <h1 class="mb-3">Explore Our Products</h1>
            <!-- Choose a type to filter on -->
            <select class="mb-2" id="dropdown" onchange="filterProducts()">
                <option value="default">Select a type</option>
                <option value="Motherboard">Motherboard</option>
                <option value="CPU">CPU</option>
                <option value="SSD">SSD</option>
            </select>
        <div class="container-fluid content-row">
            <div id="row" class="row"></div>
        </div>
        <script src="/javascript/product_page.js"></script>
    </div>
</body>
</html>