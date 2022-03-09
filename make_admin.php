
<?php
session_start();  
$servername="localhost";
    $username="root";
    $password="";
    $database="admin";
    $f=1;
    $con= new mysqli($servername,$username,$password,$database);
    if(!$con){
      die("connection failed");
    } 
    $sql="UPDATE `admin` SET `Admin`='admin' WHERE Sr_No=".$_GET['Sr_No'];
    if($con->query($sql)==true){
        header("location:admin_dashboard.php");
    }
    else echo $con->error;

?>