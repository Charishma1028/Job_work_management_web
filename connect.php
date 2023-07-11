<?php 

$server_name='localhost';
$user='root';
$passcode='';
$db='job_work_management';

$conn=mysqli_connect($server_name,$user,$passcode,$db);
if(!$conn){
    die(mysqli_error($conn));
}

?>