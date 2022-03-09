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
    $sql="delete from comments where Comment_id=".$_GET['comment_id'];
    if($con->query($sql)==true){
        header("location:show_post.php?user_id=".$_GET['post_id']);
    }
    else echo $con->error;

?>