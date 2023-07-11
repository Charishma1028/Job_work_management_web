<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Work Manager</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .sub-heading {
            font-size: 18px;
            font-weight: bold;
            
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-family: sans-serif;
            color: #000000;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }
        .input-field:focus {
            outline: none;
            border-color: #6c63ff;
        }
        .button-group {
            margin-top: 20px;
            text-align: center;
        }
        .button {
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .button-primary {
            background-color: #000000;
            color: #fff;
            border: none;
        }
        .button-primary:hover {
            background-color: #534dd6;
        }
        .button-secondary {
            background-color: #ccc;
            color: #333;
            border: none;
            margin-left: 10px;
        }
        .button-secondary:hover {
            background-color: #b3b3b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
        .edit-button, .delete-button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .edit-button {
            background-color: #6c63ff;
            color: #fff;
            margin-right: 5px;
        }
        .edit-button:hover {
            background-color: #534dd6;
        }
        .delete-button {
            background-color: #f44336;
            color: #fff;
        }
        .delete-button:hover {
            background-color: #d32f2f;
        }
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0px;
}

h1,
h2 {
    text-align: center;
}

form {
    margin: 20px auto;
    width: 400px;
}
.editlink{
    text-align: right;
    margin-right: 130px;
    
}
.edit{
    margin-right: 25px;
    color: black;
    font-family: sans-serif;
    font-weight: bold;
    font-size: 20px;
}
.delete{
    color: black;
    font-family: sans-serif;
    font-weight: bold;
    font-size: 20px;
    margin-left: 10px;
}
.edit:hover{
    font-size: 15px;
    color: blue;
    
}
.delete:hover{
    font-size: 15px;
    color: red;
    
}
.newtxt{
    color: white;
    font-family:sans-serif;
    font-weight: bold
    ;
    padding: 10px;
    margin-left: 15px;

}
.link{
    color: white;
    font-family: sans-serif;
    font-weight: bold;
    margin-right: 100px;
}
.button_cont:hover{
    background: white;
    color: black;
    border-width: 2px;
    border-color: black;
}
.required:after {
    content:" *";
    color: red;
  }
label {
    display: block;
    margin-top: 10px;
}
.button_cont{
    background-color: black;
    color:#ffffff;
    height:40px;
    width:120px;
    font-weight: 600;
    border-radius: 10px;
    border-width: 0;
}

.container{  
    text-align: center; 
    margin-top: 20px; }

input[type="text"],
input[type="number"],
input[type="tel"],
input[type="email"],
textarea,
select {
    width: 100%;
    padding: 5px;
    margin-top: 5px;
}

input[type="submit"],
input[type="button"] {
    display: block;
    margin-top: 20px;
}

input[type="radio"] {
    margin-right: 5px;
}
.search-input {
    padding: 10px;
    width: 300px;
    font-size: 16px;
  }

  .search-button {
    padding: 10px 20px;
    background-color: #090a09;
    color: white;
    font-size: 16px;
    border: none;
    margin:5px;
  }
  
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<header class="navbar navbar-dark bg-dark">
        <h1 class="newtxt">Job work manager</h1>
      <p> <a class="link" href="inventory.php">Home</a></p>
    </header>
    <h2>Material Inward</h2>
    
    <form action="#" method="POST">
        <div class="form-group">
            <label>Goods Inward Number:</label>
            <input type="text" id="inward-number" class="input-field" name="inwd_num">
        </div>
        <div class="form-group">
            <label>Date:</label>
            <input type="date" id="inward-date" class="input-field" name="inwd_date">
        </div>
        <div class="form-group">
            <label>Customer Name:</label>
            <select id="customer-name" class="input-field" name="cust_name" >
                <?php
                include 'connect.php';
                $query="SELECT Cust_Id,Cust_CompanyName FROM `jwm_custmaster`";
                $res=mysqli_query($conn,$query);
                while($r=mysqli_fetch_array($res)){
                   ?>
                           <option value="<?php echo $r['Cust_Id']?>"><?php echo $r['Cust_CompanyName'] ?></option>
                   <?php
                }
                
                
                ?>
                
            </select>
            
        </div>
        <div class="form-group">
            <label>Customer DC Number:</label>
            <input type="text" id="dc-number" class="input-field" name="cust_dc_num">
        </div>
        <div class="form-group">
            <label>Customer DC Date:</label>
            <input type="date" id="dc-date" class="input-field" name="cust_dc_date">
        </div>
        <div class="form-group">
            <label>Truck Number:</label>
            <input type="text" id="truck-number" class="input-field" name="truck_num">
        </div>
        <div class="form-group">
            <label>Transporter Name:</label>
            <input type="text" id="transporter-name" class="input-field" name="tnptr_name">
        </div>
        <div class="form-group">
            <label>Remarks:</label>
            <textarea id="remarks" class="input-field" name="remarks"></textarea>
        </div>
        <div class="form-group">
            <label>Product</label>
            <input type="text" id="product-name" class="input-field" name="pdt_name">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" id="product-name" class="input-field" name="pdt_qunty">
        </div>
        <div class="button-group">
            <button class="button button-primary" name="save">Save</button>
            <button class="button button-secondary">Cancel</button>
        </div>
        
    </form>
    
    <script>
        // Add your JavaScript code here
        var productList = []; // Array to store added products
        
        function addProduct() {
            var product = {
                code: "ABC123",
                description: "Product Description",
                units: "Kg",
                quantity: 10,
                batchNumber: "BATCH001"
            };
            
            productList.push(product);
            renderProductList();
        }
        
        function editProduct(index) {
            // Implement edit functionality here
            console.log("Edit product at index", index);
        }
        
        function deleteProduct(index) {
            productList.splice(index, 1);
            renderProductList();
        }
        
        function renderProductList() {
            var productRows = "";
            for (var i = 0; i < productList.length; i++) {
                var product = productList[i];
                productRows += "<tr>";
                productRows += "<td>" + product.code + "</td>";
                productRows += "<td>" + product.description + "</td>";
                productRows += "<td>" + product.units + "</td>";
                productRows += "<td>" + product.quantity + "</td>";
                productRows += "<td>" + product.batchNumber + "</td>";
                productRows += "<td><button class='edit-button' onclick='editProduct(" + i + ")'>Edit</button></td>";
                productRows += "<td><button class='delete-button' onclick='deleteProduct(" + i + ")'>Delete</button></td>";
                productRows += "</tr>";
            }
            document.getElementById("product-list").innerHTML = productRows;
        }
        
        // Initial rendering of the product list
        renderProductList();
    </script>
</body>
</html>











<?php
if(isset($_POST['save'])){
    $GOUT_Number=$_POST['inwd_num'];
    $GOUT_Date=$_POST['inwd_date'];
    $GOUT_CustID=$_POST['cust_name'];
    $GOUT_DCNumber=$_POST['cust_dc_num'];
    $GOUT_DCDate=$_POST['cust_dc_date'];
    $GOUT_TruckNumber=$_POST['truck_num'];
    $GOUT_Transporter=$_POST['tnptr_name'];
    $GOUT_Remarks=$_POST['remarks'];
    
    $check_id="SELECT * FROM jwm_material_inward WHERE GOUT_Number='$GOUT_Number'";
    $r=mysqli_query($conn,$check_id);
    $count=mysqli_num_rows($r);
    if($count>0){
        echo '<script> alert("good already exists") </script>';
    }else{
        $sql="INSERT INTO jwm_material_inward(GOUT_Number,GOUT_Date,GOUT_CustID,GOUT_DCNumber,GOUT_DCDate,GOUT_TruckNumber,GOUT_Transporter,GOUT_Remarks) values('$GOUT_Number','$GOUT_Date','$GOUT_CustID','$GOUT_DCNumber','$GOUT_DCDate','$GOUT_TruckNumber','$GOUT_Transporter','$GOUT_Remarks')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script> alert(" added successfully") </script>';
        }
        else{
            echo '<script> alert("Request unsuccessful") </script>';
            die(mysqli_error($conn));
        }
    }
  
    
}



?>




<?php

if(isset($_POST['save'])){
    $GOUT_Number=$_POST['inwd_num'];
    $Product=$_POST['pdt_name'];
    $Quantity=$_POST['pdt_qunty'];
    
  
        $sql="INSERT INTO jwm_material_in_child(GOUT_Number,Product,Quantity) values('$GOUT_Number','$Product','$Quantity')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script> alert(" added successfully") </script>';
        }
        else{
            echo '<script> alert("Request unsuccessful") </script>';
            die(mysqli_error($conn));
        }
    

}
?>





