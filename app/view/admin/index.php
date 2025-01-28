<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>

    <!-- Form for adding a new product to the website -->
    <div class="container mt-5 p-2 col-12 col-md-6 border">
        <h1>Add product</h1>
        <form action="/admin/insert" method="POST">
            <div class="form-group">
                <label for="inputName">Product name:</label>
                <input type="text" class="form-control mb-2" name="inputName" placeholder="Product name..." required>
            </div>


            <div class="form-group">
                <label for="inputDescription">Desription:</label>
                <textarea class="form-control mb-2" name="inputDescription" placeholder="Product description..." rows="3"></textarea required>
        </div>

        <div class="form-group">
            <label for="inputPrice">Price:</label>
            <input type="text" class="form-control mb-2" name="inputPrice" placeholder="Product price..." required>
        </div>

        <div class="form-group">
            <label for="inputType-Add">Type:</label><br>
            <select class="mt-2" id="dropdown-add" name="inputType-Add">
                <option value="Motherboard">Motherboard</option>
                <option value="CPU">CPU</option>
                <option value="SSD">SSD</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-5">Add</button>
    </form>
    </div>


    <!-- Form for editing an existing product -->
    <div class="container mt-5 p-2 col-12 col-md-6 border">
        <h1>Edit product</h1>
        
        <!-- dropdown connected to js script to change values depending on chosen id -->
        <select id="dropdown" class="mb-2" onchange="showForm()">
            <?php
            foreach ($model ?? [] as $product) : ?>
                <option value="<?php echo $product->id ?>"><?php echo $product->name ?></option>
                <?php endforeach; ?>
        </select>
        
        <form action="/admin/update" method="POST">
            <input type="hidden" id="id" name="id">
            
            <div class="form-group">
                <label for="inputName">Product name:</label>
                <input type="text" class="form-control mb-2" id="inputName" name="inputName" placeholder="Product name..." required>
            </div>
            
            <div class="form-group">
                <label for="inputDescription">Description:</label>
                <textarea class="form-control mb-2" id="inputDescription" name="inputDescription" rows="3"></textarea required>
            </div>

            <div class="form-group">
                <label for="inputPrice">Price:</label>
                <input type="text" class="form-control mb-2" id="inputPrice" name="inputPrice" placeholder="Price..." required>
            </div>

            <div class="form-group">
            <label for="inputType-edit">Type:</label><br>
            <select class="mt-2" id="dropdown-edit" name="inputType-edit">
                <option value="Motherboard">Motherboard</option>
                <option value="CPU">CPU</option>
                <option value="SSD">SSD</option>
            </select>
        </div>
            <button type="submit" name="submit" class="btn btn-primary mt-5">Edit</button>
    </form>
    </div>
    </div>


    
    <!-- Form for deleting a product -->
    <div class="container mt-5 p-2 col-12 col-md-6 border">
        <h1>Delete product</h1>
        <table class="table">
                <thead>
                    
                <!-- Table head row -->
                <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <!-- foreach product, enter values into table -->
                    <?php
                    $subtotal = 0;
                    foreach ($model ?? [] as $product) : ?>
                        <tr>
                            <th scope="row"><?php echo $product->name ?></th>
                            <td><?php echo $product->description ?></td>
                            <td><?php echo $product->price ?></td>
                            <td><a class="btn btn-danger" href="/admin/delete?id=<?php echo $product->id ?>" role="button">Delete</a></td>
                        </tr> 
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>



    <!-- JS script which shows an form each time you change the selection input of the edit form -->
    <script>
        function showForm()
        {
            fetch('/api/product/detail?id=' + document.getElementById("dropdown").value) // <-- call to api route
            .then(result => result.json()) // <-- get json
            .then(data => {
                
                // fill in values of the data to form
                document.getElementById("inputName").setAttribute("value", data.name);
                document.getElementById("inputDescription").innerHTML = data.description;
                document.getElementById("inputPrice").setAttribute("value", data.price);
                document.getElementById("id").setAttribute("value", data.id);
                document.getElementById("dropdown-edit").value = data.type;
            })
            .catch(error => console.log(error));
        }
        showForm();
    </script>
</body>