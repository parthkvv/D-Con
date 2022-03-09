<?php
    $err='';
    session_start(); 
    if(isset($_POST['submit'])){
        $servername="localhost";
        $username="root";
        $password="";
        $database="admin";
        $f=1;
        $con= new mysqli($servername,$username,$password,$database);
        if(!$con){
            die("connection failed");
        }
        $id=$_SESSION['user_id'];
        $user=$_POST['user'];
        $status=$_POST['Status'];
        $cname=$_POST['company_name'];
        $cwebsite=$_POST['company_website'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $skills=$_POST['skills'];
        $about=$_POST['about'];
        $github=$_POST['github'];
        $linkedin=$_POST['linkedin'];

        $sql="select * from profile where User_Id=".$id;
        $result=$con->query($sql);
        if($result->num_rows>0){
            $sql="delete from profile where User_Id=".$id;
            $result=$con->query($sql);
        }
        $currentDirectory = getcwd();
        $target_dir = $currentDirectory."/Profile pics/";
        if(is_uploaded_file(basename($_FILES["fileToUpload"]["name"]))){
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            
            if (file_exists($target_file)) {
                $err= "<br>Sorry, file already exists.<br>";
                $uploadOk = 0;
            }

            if ($_FILES["fileToUpload"]["size"] > 10000000) {
                $err="<br>Sorry, your file is too large.<br>";
                $uploadOk = 0;
            }

            if ($imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
                $err= "<br>Sorry, jpeg, jpg, png, and gif files are only allowed.<br>";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                $err= "<br>Sorry, your file was not uploaded.<br>";
                
            } else {
                $newfilename =  $_SESSION['user_id'].'.'. $imageFileType;
                if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
                    $err= "<br>Sorry, there was an error uploading your file.";
                } else {
                    $sql="insert into profile(`User_Id`, `Name`, `Status`, `Company_Name`, `Comapny_Website`, `City`, `State`, `Skills`, `About_You`, `Linkedin_Profile`, `Github_Profile`) 
                    values($id,'$user','$status','$cname','$cwebsite','$city','$state','$skills','$about','$linkedin','$github')";
                    if ($con->query($sql)==true) {
                        header("location:dashboard.php?user=".$user);
                    }
                }
            }
        }else{
            $sql="insert into profile(`User_Id`, `Name`, `Status`, `Company_Name`, `Comapny_Website`, `City`, `State`, `Skills`, `About_You`, `Linkedin_Profile`, `Github_Profile`) 
                    values($id,'$user','$status','$cname','$cwebsite','$city','$state','$skills','$about','$linkedin','$github')";
                    if ($con->query($sql)==true) {
                        echo "yes";
                        header("location:dashboard.php?user=".$user);
                    }
        }

        
    }
 
?>

<?php

    if (isset($_POST['upload'])) {
        
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<!--===============================================================================================-->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" 
         style="background-image: url('images/bj.jpg');background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;">
			<div class="wrap-login100" >
				<div class="login100-form-title" style="background-image: url(l_images/bg-01.jpg);" >
					<span class="login100-form-title-1">
                        <p style="font-size:50px; color:white">Edit Profile</p>
						
					</span>
                </div>
                <div class="validate-input m-b-26" text-align="center">
                <span style="color:red"><?php echo  $err;?></span>
                </div>
                <br><br>
                <form class="login100-form validate-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                
                 
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">Name</span>
                        <input class="input100" id="name" type="text" name="user"  placeholder="Enter username">
                        <span class="focus-input100"></span>
                </div>
                
                <div class="wrap-input100  m-b-26">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">Status</span>
                        <br>
                        <select class="input100"  style="color:Black" name="Status" id="Status">
                            <option value="Select Professional Status">Select Professional Status</option>
                            <option value="Developer">Developer</option>
                            <option value="Junior Developer">Junior Developer</option>
                            <option value="Senior Developer">Senior Developer</option>
                            <option value="Full Stack Developer">Full Stack Devloper</option>
                            <option value="Instructor">Instructor</option>
                            <option value="Student">Student</option>
                            <option value="App Developer">App Developer</option>
                        </select>
                        <span class="focus-input100"></span>
                </div>
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="Company Name is required">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">Company Name</span>
                        <input class="input100" type="text" name="company_name"  style="color:Black" placeholder="Enter company name">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Company Website is required">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">Company Website</span>
                        <input class="input100" type="url" name="company_website"  style="color:Black" placeholder="Enter company website or your website">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="City is required">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">City</span>
                        <input class="input100" type="text" name="city"  style="color:Black" placeholder="Enter City name">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="State is required">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">State</span>
                        <input class="input100" type="text" name="state"  style="color:Black" placeholder="Enter State name">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Skill is required">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">Skills</span>
                        <input class="input100" type="text" name="skills"  style="color:Black" placeholder="Enter your professional skills">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 m-b-26">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">About You</span>
                        <input class="input100" type="textarea" name="about"  style="color:Black" placeholder="Tell something about you">
                        <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-26">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">Linkedin Profile</span>
                        <input class="input100" type="url" name="linkedin"  style="color:Black" placeholder="Enter your Linkedin profile link">
                        <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-26">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">Github Profile</span>
                        <input class="input100" id="git" type="url" name="github"  style="color:Black" placeholder="Enter your Github profile link">
                        <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 m-b-26">
						<span class="label-input100" style=" font-size:20px; font-weigth:1000;">Select Photo</span>
                        <input class="input100" type="file" name="fileToUpload" id="fileToUpload"  style="color:Black" >
                        <span class="focus-input100"></span>
                </div>
                
                <div>
                
                <br><br><br><br>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn"
                            value="Submit"
                            name='submit'>
					</div>
				</form>
			</div>
		</div>
	</div>


</body>
</html>