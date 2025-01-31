<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>
<link href="/css/styles.css" rel="stylesheet">
    <div class="container mt-5">
        <div id="detail-body container" class="detail-body container">
        </div>
        <div class="detail-form container">
            <!-- form used for adding to cart -->
            <form id="form" method="post">
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="100" placeholder="Quantity" required>
            </form>
        </div>
    </div>

    <script>
        function sendForm(product_id) {
            const data = {
                quantity: document.getElementById("quantity").value,
                id: product_id
            };
            fetch("/api/cart", { // <-- post through api
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    return response.text();
                }).then(response => {
                    console.log(response);
                });
        }

        fetch('/api/product/detail' + window.location.search) // <-- call to api route
            .then(result => result.json()) // <-- get json
            .then(data => {

                // create elements
                const product_Header = document.createElement("h1");
                product_Header.innerHTML = data.name;

                const description_Header = document.createElement("h2");
                description_Header.className = "mt-5"
                description_Header.innerHTML = "Description ";

                const description = document.createElement("p");
                description.innerHTML = data.description;

                const price = document.createElement("p");
                price.innerHTML = "<b>Price: </b> " + data.price

                const addButton = document.createElement("button");
                addButton.innerHTML = "Add to Cart";
                addButton.className = "btn-add-to-basket";
                addButton.onclick = function () {sendForm(data.id);}

                document.getElementById("detail-body container").appendChild(product_Header);
                document.getElementById("detail-body container").appendChild(description_Header);
                document.getElementById("detail-body container").appendChild(description);
                document.getElementById("detail-body container").appendChild(price);
                document.getElementById("form").appendChild(addButton);
            })
            .catch(error => console.log(error));
    </script>
</body>