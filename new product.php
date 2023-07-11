
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
        <h2>Product Master</h2>
        <div class="editlink colum">
            <a class="edit" href="productedit.php">Edit</a>
            <a class="delete" href="productdelete.php">Delete</a>
        </div>
    
        <form id="productForm" action="#" method="POST">
            <label class="required" for="productId">Product ID</label>
            <input type="text" id="productId" name="pdid" required>
    
            <label class="required" for="productName">Product Name</label>
            <input type="text" id="productName" name="pdname" required>
            <label class="required" for="productCategory">Product Category</label>
            <select id="goods" name="pdtype">
                <option value="good0">None</option>
                <option value="Raw">Raw Material</option>
                <option value="Finished">Finished</option>
                <option value="Consumable">Consumable</option>

                <!-- Add more options as needed -->
            </select>
    
            <label for="description">Description / Remarks</label>
            <textarea id="description" maxlength="200" name="pddes" ></textarea>
    
            <label class="required" for="units">Units</label>
            <select id="units" name="pdunits" >
                <?php
                include 'connect.php';
                $query="SELECT Unit_Id,Unit_Desc FROM `jwm_unitmaster`";
                $res=mysqli_query($conn,$query);
                while($r=mysqli_fetch_array($res)){
                   ?>
                           <option value="<?php echo $r['Unit_Id']?>"><?php echo $r['Unit_Desc'] ?></option>
                   <?php
                }
                
                
                ?>
                
            </select>
    
            <label>Status</label>
            <label for="active">
                <input type="radio" id="active" name="status" value="active" checked> Active
            </label>
            <label for="inactive">
                <input type="radio" id="inactive" name="status" value="inactive"> Inactive
            </label>
            <div class="container ">
                <button type="submit" class="button_cont" name="submit">Save</button>
                <button type="cancel" class="button_cont" >Cancel</button>
            </div>
            
        </form>
        

        </div>
        
        
    </div>
    <script src="new product.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
</body>

</html>

<?php
if(isset($_POST['submit'])){
       
    $Prod_Id=$_POST['pdid'];
    $Prod_Name=$_POST['pdname'];
    $Prod_Desc=$_POST['pddes'];
    $Prod_Unit_ID=$_POST['pdunits'];
    $Prod_Type=$_POST['pdtype'];
    $Prod_Status=$_POST['status'];

    $check_id="SELECT * FROM jwm_productmaster WHERE Prod_Id='$Prod_Id'";
    $r=mysqli_query($conn,$check_id);
    $count=mysqli_num_rows($r);
    if($count>0){
        echo '<script> alert("Product already exists") </script>';
    }else{
        $sql="INSERT INTO jwm_productmaster(Prod_Id,Prod_Name,Prod_Type,Prod_Desc,Prod_Unit_ID,Prod_Status) values('$Prod_Id','$Prod_Name','$Prod_Type','$Prod_Desc','$Prod_Unit_ID','$Prod_Status')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script> alert("Product added successfully") </script>';
    }
    else{
        echo '<script> alert("Request unsuccessful") </script>';
        die(mysqli_error($conn));
    }
    }
    
}

?>