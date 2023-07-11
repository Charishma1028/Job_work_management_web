<?php
include 'connect.php';
?>

<!DOCTYPE html>

<head>
    <title>Job Work Manager</title>
    <link rel="stylesheet" type="text/css" href="new product.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      


</head>

<body>
    <div class="universal">
        <div class="pos-f-t" class="newstye">
            <nav class="navbar navbar-dark bg-dark">
                <h1 class="newtxt">Job work manager</h1>
              <p> <a class="link" href="inventory.php">Home</a></p>
            </nav>
        </div>
        <div>
        <h2 class="head">Delete Product </h2>
        <div class="editlink colum">
            <a class="edit" href="new product.php">Back</a>
        </div>
    
        <form id="unitForm" action="#" method="POST">
        <div class="search-container">
<form method="POST">
            <input type="text" class="search-input" name="pid" placeholder="Enter your search term...">
            <button class="search-button" name="search">Search</button>
</form>
          </div>
<?php
  if(isset($_POST['search'])){
    $search_ele=$_POST['pid'];
    $sql="SELECT * FROM `jwm_productmaster` WHERE Prod_Id='$search_ele'";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($res)) 
    {
      
      ?>
       <form id="productForm" action="#" method="POST">
            <label class="required" for="productId">Product ID</label>
            <input type="text" id="productId" value="<?php echo $row['Prod_Id']; ?>" name="id" required>
    
            <label class="required" for="productName">Product Name</label>
            <input type="text" id="productName" value="<?php echo $row['Prod_Name']; ?>" name="name" required>

            <label class="required" for="productCategory">Product Category</label>
            <select id="goods" name="good">
                <option >select an option</option>
                <option value="Raw"
                <?php
                   if($row['Prod_Type'] == 'Raw')
                     {
                        echo "selected";
                     }
                ?>
                >Raw</option>
                <option value="Finished"
                <?php
                   if($row['Prod_Type'] == 'Finished')
                     {
                        echo "selected";
                     }
                ?>
                >Finished</option>
                <option value="Consumable"
                <?php
                   if($row['Prod_Type'] == 'Consumable')
                     {
                        echo "selected";
                     }
                ?>
                >Consumable</option>

            </select>
    
            <label for="description">Description / Remarks</label>
            <textarea id="description" maxlength="200" value="<?php echo $row['Prod_Desc']; ?>" name="desc"></textarea>
    
            <label class="required" for="units">Units</label>
            <select id="units" name="unit">
            <option value="<?php echo $row['Prod_Unit_ID']; ?>"><?php echo $row['Prod_Unit_ID']; ?></option>
            <?php
                include 'connect.php';
                $query="SELECT Unit_Id FROM `jwm_unitmaster` ORDER BY Unit_Id";
                $res=mysqli_query($conn,$query);
                while($r=mysqli_fetch_array($res)){
                   ?>
                           <option value="<?php echo $r['Unit_Id']?>"><?php echo $r['Unit_Id'] ?></option>
                   <?php
                }
                
                
                ?>
            </select>
    
            <label>Status</label>
        <label for="active" >
            <input type="radio" id="active" name="status" value="active" checked
            <?php 
            if($row['Prod_Status']=="a")
            {
                echo "checked";
            }
            ?>
            
            > Active
        </label>
        <label for="inactive">
            <input type="radio" id="inactive" name="status" value="inactive"
            <?php 
            if($row['Prod_Status']=="i")
            {
                echo "checked";
            }
            ?>
            > Inactive
        </label>
        <div class="container ">
            <button type="submit" class="button_cont" name="delete">Delete</button>
            <button type="cancel" class="button_cont" onclick="cancelProduct()">Cancel</button>
        </div>
            
        </form>

   

<?php

  }
 
  } 

?>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 

</body>

</html>


<?php
 if(isset($_POST['delete'])){
    
    $sql="DELETE FROM jwm_productmaster WHERE Prod_Id='$_POST[id]'";
    
    $result=mysqli_query($conn,$sql);
    
    if($result){
        echo '<script> alert("Deleted Successfully") </script>';
    }
    else{
        echo '<script> alert("Deletion Unsuccessful") </script>';
        die(mysqli_error($conn));
    }
  }

?>






























     
        