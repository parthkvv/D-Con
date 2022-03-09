<?php
    session_start();  
     $a_cmp_err=$a_cmp=$a_job_err=$a_job=$a_job_loc_err=$a_job_loc=$a_start_dt_err=$a_start_dt_err=$a_start_dt=$a_job_end_err=$a_job_end= $a_abt_err= $a_abt='';
    $flag=1;
//    $test=isset($_POST['submit']);
if(isset($_POST['submit'])){
  //  $test="false";
   
    if($_SERVER['REQUEST_METHOD']='POST'){
            if(empty($_POST["company"])){
                $a_cmp_err='company is required';
            }else{
                $a_cmp=trim($_POST["company"]);
               // $_SESSION['admin']=$r_user;
            }
            if(empty($_POST["job_title"])){
                $a_job_err='job_title is required';
                // $flag=-1;
            }else{
                $a_job=$_POST["job_title"];
            }
            if(empty($_POST["job_location"])){
                $a_job_loc_err='job_locationd is required';
                // $flag=-1;
            }else{
               $a_job_loc=$_POST["job_location"];
            }
            if(empty($_POST["starting_date"])){
                $a_start_dt_err='starting_date is required';
                // $flag=-1;
            }else{
               $a_start_dt=$_POST["starting_date"];
            }
            if(empty($_POST["ending_date"])){
                $a_job_end='';
            }else{
               $a_job_end=$_POST["ending_date"];
            }
            if(empty($_POST["about"])){
                $a_abt_err='about is required';
                // $flag=-1;
            }else{
               $a_abt=$_POST["about"];
            }
            }
            if($flag==1){
                $servername="localhost";
                $username="root";
                $password="";
                $dbname="admin";
                // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        date_default_timezone_set('UTC');
        $timestamp = strtotime($a_start_dt);
        $a_start_dt=date("Y-m-d", $timestamp);
        $timestamp2 = strtotime($a_job_end);
        $a_job_end=date("Y-m-d", $timestamp);
        $sql = "INSERT INTO `experience`(`User_Id`,`Company_Name`, `Job_Tittle`, `Job_Location`, `Job_starting_date`, `Job_Ending_date`, `About_job`) VALUES (".$_SESSION['user_id'].",'$a_cmp','$a_job' , '$a_job_loc', '$a_start_dt', '$a_job_end', '$a_abt')";
          // $a_cmp_err=$a_cmp=$a_job_err=$a_job=$a_job_loc_err=$a_job_loc=$a_start_dt_err=$a_start_dt_err=$a_start_dt=$a_job_end_err=$a_job_end= $a_abt_err= $a_abt='';
        
           if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
         
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
        header('Location: Dashboard.php');
        exit;
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Experience</title>
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
			<div class="wrap-login100" >
				<div class="login100-form-title" style="background-image: url(l_images/bg-01.jpg);" >
					<span class="login100-form-title-1">
                        <p style="font-size:50px; color:white">Add Experience</p>
						
					</span>
                </div>
                <br><br>
                <div style="padding-left:30px; padding-right:30px;">
                    <p style="text-align:center; font-size:25px;">Add any job or position experience that you have experienced in past or in current</p>
                </div>
                <form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                
                 
                
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="Company Name is required">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">Company Name</span>
                        <input class="input100" type="text" name="company"  style="color:Black" placeholder="Enter company name">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Job Titile is required">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">Job Titile</span>
                        <input class="input100" type="text" name="job_title"  style="color:Black" placeholder="Enter your job title">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Job Location is required">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">Job Laction</span>
                        <input class="input100" type="text" name="job_location"  style="color:Black" placeholder="Enter the job location (City, State)">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Starting date is required">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000; ">Job Starting Date</span>
                        <input class="input100" type="date" name="starting_date"  style="color:Black" >
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 m-b-26 " id="job_end" >
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">Job Ending Date</span>
                        <input class="input100" type="date" name="ending_date"  style="color:Black">
                        <span class="focus-input100"></span>
                </div>

                <div class="contact100-form-checkbox m-b-26" >
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="currently_working" onclick="check()">
							<label class="label-checkbox100"  style=" font-size:15px; font-weigth:1000;"  for="ckb1">
								Currently Working
							</label>
				</div>

                

                <div class="wrap-input100 m-b-26">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">About Your Job</span>
                        <input class="input100" type="textarea" name="about"  style="color:Black" placeholder="Tell something about your job">
                        <span class="focus-input100"></span>
                </div>

				<div class="container-login100-form-btn">
					<input type="submit" class="login100-form-btn"
                           value="Submit"
                           name='submit'>
				</div>
				</form>
              
			</div>
		</div>
	</div>

    <script>
    function check(){
    
    var checkBox = document.getElementById("ckb1");
        if(checkBox.checked==true){
            document.getElementById('job_end').style.display = 'none'; 
        }
        else{
            document.getElementById('job_end').style.display = 'block';
            }
    }
</script>
</body>
</html>

