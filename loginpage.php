<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    
$sql="SELECT * FROM jwm_login WHERE username='$username' and password='$password'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
$count=mysqli_num_rows($res);
if($count==1){
    header("Location:inventory.php");
    ?>
    <meta http-equiv="refresh" content="0; url=
    http://localhost:8888/inv_cntrol_new/inventory.php"/>
    <?php
}else{
   echo '<script> window.location.href="loginpage.php";
   let errormsgEl=document.getElementIdBy("error-msg");
   errormsgEl.textContent = "please enter vaild details";
   aler("invalid details");
   </script> ' ;

}
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="loginpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<div>
        <nav class="navbar navbar-expand-lg navbar-light p-5" id="nav-container">
            <a class="navbar-brand" id="nav-head" href="#">Job Work Management</a>
            <button class="navbar-toggler" id="nav-icon" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link active" id="nav-items" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link active" id="nav-items" href="#">About</a>
                    <a class="nav-link active" id="nav-items" href="#">Services</a>
                    <a class="nav-link  Disabled active" id="nav-items" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <h1>Login</h1>
        <form id="loginForm" action="#" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="enter username"  required>

            <label for="password">Password:</label>
            <div class="password-input">
                <input type="password" id="password" name="password" placeholder="enter your password.."  required>
                <span class="eye_span">
                    <i class="fas fa-eye " style="color:black;"  id="togglePassword"></i>
                </span>
            </div>

            <button type="submit" class="button_cont" name="submit">login</button>
            <p id="error-msg" style="color:white"></p>
        </form>
    </div>

    <script src="loginpage.js"></script>
</body>

</html>

