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

    if(isset($_POST['submit'])){
        if (!empty($_POST['comment'])) {
            $sql= "INSERT INTO `comments`(`User_Id`, `Post_Id`, `Comments`) 
            VALUES (".$_SESSION['user_id'].",".$_GET['post_id'].",'".$_POST['comment']."')";
            $result=$con->query($sql);
            if ($result==true) {
                header('location:comment.php?post_id='.$_GET['post_id']);
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Posts</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--===============================================================================================-->	
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l_vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l_fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l_fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l_vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="l_vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l_vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l_vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="l_vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="l_css/util.css">
    <link rel="stylesheet" type="text/css" href="l_css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
        
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/brand/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-image: url('images/bj.jpg');
   background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar light site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            
            <div class="col-6  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              
            </div>
            <br><br>
        </div>
        
<div class="limiter">
		<div class="container-login100" 
         style="background-image: url('images/bj.jpg');background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;">
			<div style=" width:100%; 
                  margin:20px;background: #fff;
                  border-radius: 10px;
                  overflow: hidden;
                  position: relative;">
				<div class="login100-form-title" style="background-image: url(l_images/bg-01.jpg);" >
					<span class="login100-form-title-1">
                        <p style="font-size:50px; color:white">Comment Section</p>
						
					</span>
                </div>
            </div>

            

            
            <?php
                $sql="Select * from post where Post_Id=".$_GET['post_id'];
                $result=$con->query($sql);
                if($result->num_rows>0){
;                    while($rows=$result->fetch_assoc()){
                        echo '<div style=" width:100%; 
                        margin:20px;background: #fff;
                        border-radius: 10px;
                        overflow: hidden;
                        position: relative;">
               
                        <div style="width:100%; color:black;">
                            <p style="text-align:center;
                                        font-size:30px;
                                        font-weight:100px;
                                        color:black;
                                        margin:10px;
                                        ">';
                        echo $rows['Post_Description'];
                        echo ' </p>
                        <br><br></div>
                        </div>';
                        $path='';
                        $target_dir ="Post\\";
                        $files = glob($target_dir.$rows["Post_Id"].".*", GLOB_BRACE);
                        if(!empty($files)){
                            echo '<div style=" width:100%; 
                            margin:20px;background: #fff;
                            border-radius: 10px;
                            overflow: hidden;
                            position: relative;">
                            <div style="width:100%; color:pink;">
                            <img style="  display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width:75%;
                            height: 75%;
                            padding:20px;" src="'.$files[0].'" alter="Post Photo">
                            </div></div>';
                        } 
                    }
                }
                $sql="Select * from comments where Post_id=".$_GET['post_id']." Order by Comment_id desc";
                $result=$con->query($sql);
                if($result->num_rows>0){
                    while($rows=$result->fetch_assoc()){
                        echo '<div style=" width:100%; 
                        margin:20px;background: #fff;
                        border-radius: 10px;
                        overflow: hidden;
                        position: relative;">
                        <div style=" color:black;">
                        <p style="text-align:center;
                                        font-size:30px;
                                        font-weight:100px;
                                        color:black;
                                        margin:10px;
                                        ">';
                        echo $rows['Comments'];
                        echo '</p><br>';
                        echo '<p style="color:black; margin:10px; margin-bottom:30px; font-weight:50px font-size:50px; text-align:center"> By ';
                        $sql1 = "Select Name from profile where User_Id=".$rows['User_Id'];
                        $result1=$con->query($sql1);
                        if($result1->num_rows>0){
                            echo strtoupper( $result1->fetch_assoc()['Name']);
                        }

                        echo '</p>';
                        echo '</div></div>';
                    }
                }
                echo '<div style=" width:100%; 
                margin:20px;background: #fff;
                border-radius: 10px;
                overflow: hidden;
                position: relative;">
                <p style="text-align:center; font-size:30px; font-weight:1000; background-color:#5f5f5f; color:white">Say Something</p>
                <form style="padding:20px; height:50%;"action="comment.php?post_id='.$_GET["post_id"].'" method="post">
                    <div class="wrap-input100 m-b-26">
                            <input style="width:100%;" type="textarea" name="comment"  placeholder="Write Your Views...">
                            <span class="focus-input100"></span>
                    </div>
                    <br>
                    <div  class="container-login100-form-btn" 
                        style="align-items: right;">
                        <input type="submit" class="login100-form-btn"
                            value="Comment"
                            name="submit">
					</div>
                </form> 
            </div>';
            ?>
            
                        
                    
                    

                    
                

	</div> 
      </header>

    </div>

  </body>
</html>


