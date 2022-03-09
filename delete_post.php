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
    $sql="delete from post where post_id=".$_GET['post_id'];
    $sql1="delete from comments where post_id=".$_GET['post_id'];
    if($con->query($sql)==true){
        header("location:show_post.php?user_id=".$_GET['post_id']);
    }
    else echo $con->error;

?>