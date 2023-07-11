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


</head>

<body>
    <header class="navbar navbar-dark bg-dark">
        <h1 class="newtxt">Job work manager</h1>
      <p> <a class="link" href="inventory.php">Home</a></p>
    </header>
    <h2 class ="head">Delete Unit</h2>
    <div class="editlink colum">
        <a class="edit" href="unit_master.php">Back</a>
    </div>

    <form id="unitForm" action="#" method="POST">
    <div class="search-container">
<form method="POST">
            <input type="text" class="search-input" name="did" placeholder="Enter your search term...">
            <button class="search-button" name="search">Search</button>
</form>

        

            <?php
           
         if(isset($_POST['search'])){
            $delete_ele=$_POST['did'];
    $sql="SELECT * FROM `jwm_unitmaster` WHERE Unit_Id='$delete_ele'";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($res)) 
    {
      
      ?>
      <label class="required" for="unitId" >Unit ID</label>
        <input type="text" id="unitId" value="<?php echo $row['Unit_Id']; ?>" name="id" required>
      
        <label class="required" for="unitName">Unit Name</label>
        <input type="text" id="unitName" value="<?php echo $row['Unit_Name']; ?>" name="name" required>

        
        <label class="required" for="unitDesc">Unit Description</label>
        <textarea type="text" name="utdes" id="unitDesc" value="<?php echo $row['Unit_Desc']; ?>" required><?php echo $row['Unit_Desc']; ?></textarea>

        <label>Status</label>
        <label for="unitActive" value="<?php echo $row['Unit_Status']; ?>">
            <input type="radio" id="unitActive" name="status" value="active" checked> Active
        </label>
        <label for="unitInactive">
            <input type="radio" id="unitInactive" name="status" value="inactive"> Inactive
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
    
    $sql="DELETE FROM jwm_unitmaster WHERE Unit_Id='$_POST[id]'";
    
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