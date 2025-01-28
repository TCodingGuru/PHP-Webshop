<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>
    <div class="container mt-5">
        <h1 class="mb-3">Our products:</h1>
        <div class="container-fluid content-row">
            
        <!-- Choose a type to filter on -->
        <select class="mb-2" id="dropdown" onchange="filterProducts()">
                <option value="default"></option>
                <option value="Motherboard">Motherboard</option>
                <option value="CPU">CPU</option>
                <option value="SSD">SSD</option>
            </select>
            
            <!-- Here all cards will be shown -->
            <div id="row" class="row">
            </div>
        </div>
    </div>


    <script>
        function filterProducts() {
            document.getElementById("row").innerHTML = ""; // <-- empty the div

            // if selection is default show all, else show only of type
            if (document.getElementById("dropdown").value == "default") {
                showProducts('/api/product');
            } else {
                showProducts('/api/product/index_Filtered?type=' + document.getElementById("dropdown").value);
            }
        }

        function showProducts(uri) {
            fetch(uri) // <-- call to api route
                .then(result => result.json()) // <-- get json
                .then(products => {
                    products.forEach(product => { // <-- iterate over products

                        //  Create card
                        const column = document.createElement("div");
                        column.className = "col-sm-6 col-lg-3 mt-5";

                        const card = document.createElement("div");
                        card.className = "card h-100";

                        const card_body = document.createElement("div");
                        card_body.className = "card-body d-flex flex-column";

                        const card_title = document.createElement("h5");
                        card_title.className = "card-title";
                        card_title.innerHTML = product.name;

                        const card_content = document.createElement("p");
                        card_content.className = "card-text";
                        card_content.innerHTML = product.description;

                        const card_button = document.createElement("a");
                        card_button.className = "btn btn-primary mt-auto";
                        card_button.setAttribute('href', '/product/detail?id=' + product.id);
                        card_button.innerHTML = "More info";

                        // append to parents
                        card_body.appendChild(card_title);
                        card_body.appendChild(card_content);
                        card_body.appendChild(card_button);
                        card.appendChild(card_body);
                        column.appendChild(card);
                        document.getElementById("row").appendChild(column);

                    });
                    console.log(products)
                })
                .catch(error => console.log(error));
        }
        filterProducts();
    </script>
</body>

</html>