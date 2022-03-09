<?php
    session_start();   
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
	<?php
         $l_user=$l_pass=$l_user_err=$l_pass_err=$login_err='';
         $flag=1;

         if(isset($_POST['login'])){
     
            if($_SERVER['REQUEST_METHOD']='POST'){
                    if(empty($_POST["user"])){
                        $l_user_err='User name is required';
                        $flag=-1;
                    }else{
                        $l_user=trim($_POST["user"]);
                    }
                    if(empty($_POST["pass"])){
                        $l_pass_err='Password is required';
                        $flag=-1;
                    }else{
                        $l_pass=md5(trim($_POST["pass"]));
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
                $sql= "select * from admin where Name='$l_user'";
                $result = $con->query($sql);
    
                
                if($result->num_rows == 1){
                    if($l_pass==$result->fetch_assoc()['Password']){
                        $sql1="select Sr_No, Admin from admin where Name='$l_user'";
                        $result=$con->query($sql1);
                        while($row = $result->fetch_assoc()){
                            if (isset($_POST['remember'])) {
                                setcookie("user", $l_user, time() + (86400 * 30));
                                setcookie("user_id",$row['Sr_No'],time()+(86400*30));
                                setcookie('admin',$row['Admin'],time()+(86400*30));
                            }
                            $_SESSION['admin']=$l_user;
                            $_SESSION['user_id'] =$row['Sr_No'];
                            $_SESSION['user']= $row['Admin'];
                        }

                        
                        
                        header('location:home.php');
                    }
                    else{
                        $l_pass_err='Password is incorrect'; 
                    }         
                    
                }
                else{
                    $login_err= 'Please get register...';
                }
            }
        
        }
     
        ?>
	
	<div class="limiter">
		<div class="container-login100" 
         style="background-image: url('images/bj.jpg');background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;">
			<div class="wrap-login100" >
				<div class="login100-form-title" style="background-image: url(l_images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
                </div>
                <br><br>
                <div class="validate-input m-b-26" text-align="center">
                <span style="color:red"><?php echo  $login_err;?></span>
                </div>
                <form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                
                <span style="color:red"><?php echo  $l_user_err;?></span>    
                <div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
                        <input class="input100" type="text" name="user"  placeholder="Enter username" style="color:Black">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <span style="color:red"> <?php echo  $l_pass_err;?></span><br>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
                        <input class="input100" type="password" name="pass" placeholder="Enter password" style="color:Black">
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
							<a href="register.php" class="txt1">
								Not Registered
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn"
                            value="Login"
                            name='login'>
					</div>
				</form>
			</div>
		</div>
	</div>


</body>
</html>