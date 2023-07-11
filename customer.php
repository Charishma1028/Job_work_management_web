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
        <div class="bg_cont_custmr_reg">
                <h2 class="cust_reg_hdng">Customer Registration</h2>
                <div class="editlink colum">
            <a class="edit" href="productedit.php">Edit</a>
            <a class="delete" href="productdelete.php">Delete</a>
        </div>
                
        <div class="center" >
            <form id="customer-form" action="#" method="POST">
            <label class="required" for="customer-id">Customer ID</label>
                <input type="text" id="customer-id" name="customer-id" required>
                <label class="required" for="company-name">Company Name</label>
                <input type="text" id="company-name" name="company-name" required>
                <label class="required" for="address-line1">Address Line 1</label>
                <input type="text" id="address-line1" name="address-line1" required>
                <label for="address-line2">Address Line 2</label>
                <input type="text" id="address-line2" name="address-line2">
                <label for="address-line3">Address Line 3</label>
                <input type="text" id="address-line3" name="address-line3">
                <label class="required" for="city">City</label>
                <input type="text" id="city" name="city" required>
                <label class="required" for="state">State</label>
                <select id="state" name="state">
                    <option value="">None</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Kerala">Kerala</option>
                    <option value="TamilNadu">TamilNadu</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Maharastra">Maharastra</option>
                </select>
                <label class="required" for="pin">PIN</label>
                    <input type="number" id="pin" class="no-spinners" name="pin" min="0" max="999999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="6" required>
                    <span id="pin-error" class="error"></span>
                <label class="required" for="contact-person">Contact Person</label>
                <input type="text" id="contact-person" name="contact-person" required>
                <label class="required" for="phone1">Phone 1</label>
                <input type="number" id="phone1" name="phone1"  min="0" max="999999999999999" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" required>
                <label for="phone2">Phone 2</label>
                <input type="tel" id="phone2" name="phone2" pattern="[0-9]{1,15}">
                <label class="required" for="email">E-Mail</label>
                <input type="email" id="email" name="email" required>
                <div class="container">
                    <button type="submit" class="button_cont"  name="submit">Save</button>
                    <button type="button" class="button_cont">Cancel</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>


<?php
if(isset($_POST['submit'])){
    $Cust_Id=$_POST['customer-id'];
    $Cust_CompanyName=$_POST['company-name'];
    $Cust_add1=$_POST['address-line1'];
    $Cust_add2=$_POST['address-line2'];
    $Cust_add3=$_POST['address-line3'];
    $Cus_City=$_POST['city'];
    $Cust_State=$_POST['state'];
    $Cust_PIN=$_POST['pin'];
    $Cust_ContactPerson=$_POST['contact-person'];
    $Cust_Phone1=$_POST['phone1'];
    $Cust_Phone2=$_POST['phone2'];
    $cust_Mail1=$_POST['email'];
    
    $check_id="SELECT * FROM jwm_custmaster WHERE Cust_Id='$Cust_Id'";
    $r=mysqli_query($conn,$check_id);
    $count=mysqli_num_rows($r);
    if($count>0){
        echo '<script> alert("Custumer already exists") </script>';
    }else{
        $sql="INSERT INTO jwm_custmaster(Cust_Id,Cust_CompanyName,Cust_add1,Cust_add2,Cust_add3,Cus_City,Cust_State,Cust_PIN,Cust_ContactPerson,Cust_Phone1,Cust_Phone2,cust_Mail1) values('$Cust_Id','$Cust_CompanyName','$Cust_add1','$Cust_add2','$Cust_add3','$Cus_City','$Cust_State','$Cust_PIN','$Cust_ContactPerson','$Cust_Phone1','$Cust_Phone2','$cust_Mail1')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script> alert("Customer added successfully") </script>';
        }
        else{
            echo '<script> alert("Request unsuccessful") </script>';
            die(mysqli_error($conn));
        }
    }
  
    
}

?>