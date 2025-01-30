function showProducts(uri) {
    fetch(uri) // <-- call to api route
        .then(result => result.json()) // <-- get json
        .then(products => {
            const row = document.getElementById("row");
            row.innerHTML = ""; // Clear any previous products
            products.forEach(product => { // <-- iterate over products

                // Create card for each product
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

                // Append to the parent card body
                card_body.appendChild(card_title);
                card_body.appendChild(card_content);
                card_body.appendChild(card_button);
                card.appendChild(card_body);
                column.appendChild(card);

                // Append the product column to the row container
                row.appendChild(column);
            });
        })
        .catch(error => console.log("Error fetching products:", error));
}

// Function to handle filter selection change
function filterProducts() {
    const selectedValue = document.getElementById("dropdown").value;

    if (selectedValue === "default") {
        // Show all products if "default" is selected
        showProducts("/api/product");
    } else {
        // Show filtered products based on selected type
        showProducts('/api/product/index_Filtered?type=' + selectedValue);
    }
}

// Call showProducts when the page loads to display all products by default
document.addEventListener('DOMContentLoaded', function () {
    showProducts('/api/product'); // Show all products initially
});