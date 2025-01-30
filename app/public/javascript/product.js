document.addEventListener("DOMContentLoaded", function () {
    // Function to send product data to the cart API
    function sendForm(product_id) {
        // Retrieve the quantity from the input field
        const quantity = document.getElementById("quantity").value;

        // Check if the quantity is a valid number and greater than 0
        if (quantity <= 0 || isNaN(quantity)) {
            alert("Please enter a valid quantity!");
            return; // Prevent sending invalid data
        }

        // Prepare data for the POST request
        const data = {
            quantity: quantity,
            id: product_id
        };

        // Perform the POST request to add the product to the cart
        fetch("/api/cart/index", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(response => response.text())
            .then(response => {
                console.log("Add to cart response:", response);
                alert("Product added to the cart successfully!");
            })
            .catch(error => {
                console.error("Error adding product to cart:", error);
                alert("An error occurred while adding the product to the cart.");
            });
    }

    // Fetch product details from the API (using the query string)
    fetch('/api/product/detail' + window.location.search)
        .then(result => result.json()) // Get JSON response
        .then(data => {
            // Ensure the necessary data exists
            if (!data || !data.name || !data.description || !data.price) {
                document.getElementById("detail-body").innerHTML = "<h2>Product not found.</h2>";
                return;
            }

            // Get the detail-body container
            const detailBody = document.getElementById("detail-body");
            if (!detailBody) {
                console.error("Element with ID 'detail-body' not found!");
                return;
            }

            // Create product details
            const productHeader = document.createElement("h1");
            productHeader.innerHTML = "Product: " + data.name;

            const descriptionHeader = document.createElement("h2");
            descriptionHeader.className = "mt-5";
            descriptionHeader.innerHTML = "Description:";

            const description = document.createElement("p");
            description.innerHTML = data.description;

            const price = document.createElement("p");
            price.innerHTML = "<b>Price: </b> " + data.price;

            // Create the "Add to Cart" button
            const addButton = document.createElement("button");
            addButton.innerHTML = "Add to Cart";
            addButton.className = "btn btn-primary mt-3";
            addButton.onclick = function () {
                sendForm(data.id); // Trigger the function to add the product to the cart
            };

            // Clear previous content and append the new content
            detailBody.innerHTML = ''; // Clear the existing content
            detailBody.appendChild(productHeader);
            detailBody.appendChild(descriptionHeader);
            detailBody.appendChild(description);
            detailBody.appendChild(price);

            // Append the add to cart button to the form
            const formContainer = document.getElementById("form");
            formContainer.innerHTML = ''; // Clear any previous buttons
            formContainer.appendChild(addButton);
        })
        .catch(error => {
            console.error("Error fetching product details:", error);
            document.getElementById("detail-body").innerHTML = "<h2>Error loading product details.</h2>";
        });
});
