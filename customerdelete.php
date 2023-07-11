<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Job Work Manager</title>
    <link rel="stylesheet" type="text/css" href="customer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="pos-f-t">
        <nav class="navbar navbar-dark bg-dark">
            <h1 class="newtxt">Job work manager</h1>
          <p> <a class="link" href="inventory.php">Home</a></p>
        </nav>
      </div>
    <div class="container">
        <h2 class="cust_reg_hdng">Delete Customer</h2>

        <div class="editlink colum">
            <a class="edit" href="customer.php">Back</a>
        </div>
        <div class="bg_cont_custmr_reg">
            <div class="center" >
                
            <form id="customer-form" action="#" method="POST">
            <div class="search-container">
<form method="POST">
            <input type="text" class="search-input" name="cid" placeholder="Enter your search term...">
            <button class="search-button" name="search">Search</button>
</form>
          </div>

<?php
  if(isset($_POST['search'])){
    $search_ele=$_POST['cid'];
    $sql="SELECT * FROM `jwm_custmaster` WHERE Cust_Id='$search_ele'";
    $res=mysqli_query($conn,$sql);
    
    while($row=mysqli_fetch_array($res)) 
    {
      
      ?>


            <form id="customer-form" action="#" method="POST">
                <label class="required" for="customer-id">Customer ID</label>
                <input type="text" id="customer-id" name="id" value="<?php echo $row['Cust_Id']; ?>" required>
                <label class="required" for="state">Company Name</label>
                <input type="text" id="customer-name" name="name" value="<?php echo $row['Cust_CompanyName']; ?>" required>
                <label class="required" for="address-line1">Address Line 1</label>
                <input type="text" id="address-line1" name="adline1"  value="<?php echo $row['Cust_add1']; ?>" required>
                <label for="address-line2">Address Line 2</label>
                <input type="text" id="address-line2" name="adline2" value="<?php echo $row['Cust_add2']; ?>">
                <label for="address-line3">Address Line 3</label>
                <input type="text" id="address-line3" name="adline3" value="<?php echo $row['Cust_add3']; ?>">
                <label class="required" for="city">City</label>
                <input type="text" id="city" name="city" value="<?php echo $row['Cus_City']; ?>" required >
                <label class="required" for="state">State</label>
                <select id="state" name="state">
                    <option value="">None</option>
                    <option value="Andhra Pradesh"
                    <?php
                    if($row['Cust_State'] == 'Andhra Pradesh'){
                        echo "selected";
                    }
                    ?>
                    >Andhra Pradesh</option>
                    <option value="Telangana"
                    <?php
                    if($row['Cust_State'] == 'Telangana'){
                        echo "selected";
                    }
                    ?>
                    >Telangana</option>
                    <option value="Kerala"
                    <?php
                    if($row['Cust_State'] == 'Kerala'){
                        echo "selected";
                    }
                    ?>
                    >Kerala</option>
                    <option value="TamilNadu"
                    <?php
                    if($row['Cust_State'] == 'TamilNadu'){
                        echo "selected";
                    }
                    ?>
                    >TamilNadu</option>
                    <option value="Karnataka"
                    <?php
                    if($row['Cust_State'] == 'Karnataka'){
                        echo "selected";
                    }
                    ?>
                    >Karnataka</option>
                    <option value="Maharastra"
                    <?php
                    if($row['Cust_State'] == 'Maharastra'){
                        echo "selected";
                    }
                    ?>
                    >Maharastra</option>
                </select>
                <label class="required" for="pin">PIN</label>
                    <input type="number" id="pin" class="no-spinners" value="<?php echo $row['Cust_PIN']; ?>" name="pin" min="0" max="999999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" required>
                    <span id="pin-error" class="error"></span>
                <label class="required" for="contact-person">Contact Person</label>
                <input type="text" id="contact-person" name="cntpr" value="<?php echo $row['Cust_ContactPerson']; ?>" required>
                <label class="required" for="phone1">Phone 1</label>
                <input type="number" id="phone1" name="phone1" value="<?php echo $row['Cust_Phone1']; ?>"  min="0" max="999999999999999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" required>
                <label for="phone2">Phone 2</label>
                <input type="tel" id="phone2" name="phone2" value="<?php echo $row['Cust_Phone2']; ?>"  pattern="[0-9]{1,15}">
                <label class="required" for="email">E-Mail</label>
                <input type="email" id="email" name="email" value="<?php echo $row['cust_Mail1']; ?>" required>
                <div class="container">
                    <button type="submit" class="button_cont" name="delete">Delete</button>
                    <button type="button" class="button_cont" onclick="cancelProduct()">Cancel</button>
                </div>
            </form>

            <?php

  }
 
  } 

?>
        </div>
        </div>
    </div>
    </div>

           
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
<?php
 if(isset($_POST['delete'])){
    
    $sql="DELETE FROM jwm_custmaster WHERE Cust_Id='$_POST[id]'";
    
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