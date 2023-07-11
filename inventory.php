<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Job Work Manager</title>
    <link rel="stylesheet" href="inventory.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <h1 class="newtxt">Job work manager</h1>
    </nav>
    <main>
        <div class="bg_cont">
            <h1 class="bg_cont_des" >Manage your Work here  </h1>
        </div>
        <div class="actions_cont">
        <div class="container customer">
            <i class='fas fa-user-alt'></i>
            <h2>Customers</h2>
            <p>This is the customer container.</p>
            <a href="customer.php">
            <button class="button_cont">Add Customer</button>
            </a>
        </div>
        <div class="container product">
            <h2>Products</h2>
            <p>This is the product container.</p>
            <a href="new product.php">
            <button class="button_cont">Add Product</button>
            </a>
        </div>
        <div class="container master">
            <h2>Master</h2>
            <p>This is the master container.</p>
            <a href="unit_master.php">
            <button class="button_cont">Add Unit</button>
            </a>
        </div>
        <div class="container master">
            <h2>Material Inwards</h2>
            <p>This is the material inwards container.</p>
            <a href="materialiwd.php">
            <button class="button_cont">Add goods</button>
            </a>
        </div>
        <div class="container master">
            <h2>Stock Details</h2>
            <p>Find the stock here</p>
            <a href="stock.php">
            <button class="button_cont">Show Stock</button>
            </a>
        </div>
    </div>
    </main>
    <footer>
        <p>Copyright &copy; 2023 Job Work Manager</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>