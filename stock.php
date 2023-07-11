<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Job Work Manager</title>
    <link rel="stylesheet" type="text/css" href="unit_master.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Caveat:wght@400;700&family=Lobster&family=Monoton&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display+SC:ital,wght@0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,700&family=Work+Sans:ital,wght@0,400;0,700;1,700&display=swap');

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
    font-weight: bold;
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
     </style>

</head>

<body>
    <header class="navbar navbar-dark bg-dark">
        <h1 class="newtxt">Job work manager</h1>
      <p> <a class="link" href="inventory.php">Home</a></p>
    </header>
    <h2>Stock Details</h2>
    <form id="unitForm" action="#" method="POST">
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

        <div class="form-group">
            <label>From Date:</label>
            <input type="date" id="inward-date" class="input-field" name="from">
        </div>
        <div class="form-group">
            <label>To Date:</label>
            <input type="date" id="inward-date" class="input-field" name="to">
        </div>
        
        <div class="container ">
            <button type="submit" class="button_cont" name="submit">Go</button>
        </div>

        
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>

<?php

if(isset($_POST['submit'])){
    $custId=$_POST['cust_name'];
    $srtdate=$_POST['from'];
    $enddate=$_POST['to'];
    $sql="SELECT jwm_material_in_child.Product,
    jwm_material_in_child.Quantity
  FROM jwm_material_in_child
    INNER JOIN jwm_material_inward ON jwm_material_in_child.GOUT_Number=jwm_material_inward.GOUT_Number
  WHERE (jwm_material_inward.GOUT_CustID ='$custId') AND (jwm_material_inward.GOUT_Date BETWEEN '$srtdate' AND '$enddate'); ";
  $result=mysqli_query($conn,$sql);
  if($result){
    echo '<script> alert(" details fetched") </script>';
    while($row=mysqli_fetch_array($result)){
        ?>
        
        <h1 style="font-size:30px;">Product:
        <?php echo $row['Product'] ?></h1>
        <h1 style="font-size:30px;">Quantity:
        <?php echo $row['Quantity'] ?></h1>

     <?php
    
    }
  }
  else{
      echo '<script> alert("not found") </script>';
      die(mysqli_error($conn));
  }

}


?>