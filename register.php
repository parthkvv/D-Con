<?php
    session_start();
    $r_user=$r_pass=$r_c_pass=$r_c_pass_err=$r_user_err=$r_pass_err=$register_err='';
    $flag=1;
if(isset($_POST['register'])){
    if($_SERVER['REQUEST_METHOD']='POST'){
            if(empty($_POST["user"])){
                $r_user_err='User name is required';
                $flag=-1;
            }else{
                $r_user=trim($_POST["user"]);
                $_SESSION['admin']=$r_user;
            }
            if(empty($_POST["pass"])){
                $r_pass_err='Password is required';
                $flag=-1;
            }else{
                $r_pass=md5(trim($_POST["pass"]));
            }
            if(empty($_POST["c_pass"])){
                $r_c_pass_err='Confirm Password is required';
                $flag=-1;
            }else{
                if($_POST["pass"]==$_POST["c_pass"]){
                    $r_c_pass=md5(trim($_POST["c_pass"]));
                }
                else{
                    $r_c_pass_err='Password did not match';
                    $flag=-1;
            }
            }
    }
    if($flag==1){
        $servername="localhost";
        $username="root";
        $password="";
        $database="admin";
        $f=1;
        $con= new mysqli($servername,$username,$password,$database);
        if(!$con){
            die("connection failed");
        }
    
        // //Create database:
        // $sql="create database admin";
    
        // if($con->query($sql)== true){
        //     echo 'database created';
        // }
        // else{
        //     echo 'database not created';
        // }
    
        // // Create table
        // $sql="create table admin(Name varchar(225), Password varchar(255))";
        // if($con->query($sql)== true){
        //     echo 'tabel inserted succesfully';
        // }
        // else{
        //     echo 'data inserted unsuccesfully';
        // }
        $sql= "select * from admin where Name='$r_user'";
        $result = $con->query($sql);
        
        if($result->num_rows > 0){            
            $register_err= 'Username already exist.<br>Use another username.';
        }
        else{
            $sql= "insert into admin(Name, Password) values('$r_user','$r_pass')";
            if($con->query($sql)== true){
                $_SESSION['admin']=$r_user;
                $_SESSION['user_id'] = $con->insert_id;

                if (isset($_POST['remember'])) {
                    setcookie("user", $r_user, time() + (86400 * 30));
                    setcookie("user_id",$con->insert_id,time()+(86400*30));
                }
                header('location:home.php');

            }
            else{
                echo '<script>Not registered</script>';
            }  
        }
  

    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up
    </title>
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
</head>
<body>
	
	
	<div class="limiter">
		<div class="container-login100"
        style="background-image: url('images/bj.jpg');background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(l_images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
                </div>
                <br><br>
                <div class="validate-input m-b-18" align="center">
                <span style="color:red"><?php echo  $register_err;?></span>
                </div>
				<form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <span style="color:red"><?php echo  $r_user_err;?></span>  
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="user" placeholder="Enter username" style="color:Black">
						<span class="focus-input100"></span>
                    </div>
                    <span style="color:red"><?php echo  $r_pass_err;?></span>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
                        <input class="input100" type="password" name="pass" placeholder="Enter password"  style="color:Black"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
						<span class="focus-input100"></span>
                    </div>
                    <span style="color:red"><?php echo  $r_c_pass_err;?></span>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required" >
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="c_pass" placeholder="Enter password" style="color:Black">
						<span class="focus-input100"></span>
						
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="login.php" class="txt1">
								Already Registered
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn"
                        value="Sign Up" name="register">
							
					</div>
				</form>
			</div>
		</div>
	</div>
	


</body>
</html>