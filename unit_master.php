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
    <h2>Unit Master</h2>
    <div class="editlink colum">
        <a class="edit" href="unit_masteredit.php">Edit</a>
        <a class="delete" href="unit_masterdelete.php">Delete</a>
    </div>
    <form id="unitForm" action="#" method="POST">
        <label class="required" for="unitId">Unit ID</label>
        <input type="text" id="unitId" name="utid" required>
        <p id="unitidErrorMsg"></p>

        <label class="required" for="unitName">Unit Name</label>
        <input type="text" name="utname" id="unitName" required>
        <p id="unitnameErrorMsg"></p>

        <label class="required" for="unitDesc">Unit Description</label>
        <textarea type="text" name="utdes" id="unitDesc" required></textarea>
        <p id="unitdesErrorMsg"></p>

        <label>Status</label>
        <label for="unitActive">
            <input type="radio" id="unitActive" name="unitStatus" value="active" checked> Active
        </label>
        <label for="unitInactive">
            <input type="radio" id="unitInactive" name="unitStatus" value="inactive"> Inactive
        </label>
        <div class="container ">
            <button type="submit" class="button_cont" name="submit">Save</button>
            <button type="cancel" class="button_cont" onclick="cancelUnit()">Cancel</button>
        </div>

        
    </form>
    

    <script src="unit_master.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>


<?php
if(isset($_POST['submit'])){
       
    $Unit_Id=$_POST['utid'];
    $Unit_Name=$_POST['utname'];
    $Unit_Desc=$_POST['utdes'];
    $Unit_Status=$_POST['unitStatus'];
    $check_id="SELECT * FROM jwm_unitmaster WHERE Unit_Id='$Unit_Id'";
    $r=mysqli_query($conn,$check_id);
    $count=mysqli_num_rows($r);
    if($count>0){
        echo '<script> alert("Unit already exists") </script>';
    }else{
        $sql="INSERT INTO jwm_unitmaster(Unit_Id,Unit_Name,Unit_Desc,Unit_Status) values('$Unit_Id','$Unit_Name','$Unit_Desc','$Unit_Status')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script> alert("Unit added successfully") </script>';
    }
    else{
        echo '<script> alert("Request unsuccessful") </script>';
        die(mysqli_error($conn));
    }
    }
    
    
}

?>