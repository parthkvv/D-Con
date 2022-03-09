
<?php
    session_start();  
     $a_clg_err=$a_clg=$a_job_err=$a_job=$a_job_loc_err=$a_job_loc=$a_start_dt_err=$a_start_dt_err=$a_start_dt=$a_job_end_err=$a_job_end= $a_pjt_err= $a_pjt=$a_abt_err=$a_abt='';
    $flag=1;

if( isset($_POST['submit'])){
   /// $test="false";
   
    if($_SERVER['REQUEST_METHOD']='POST'){
            if(empty($_POST["college"])){
                $a_clg_err='college is required';
            }else{
                $a_clg=trim($_POST["college"]);
               // $_SESSION['admin']=$r_user;
            }
            if(empty($_POST["job_title"])){
                $a_job_err='job_title is required';
            }else{
                $a_job=$_POST["job_title"];
            }
            if(empty($_POST["job_location"])){
                $a_job_loc_err='job_locationd is required';
            }else{
               $a_job_loc=$_POST["job_location"];
            }
            if(empty($_POST["starting_date"])){
                $a_start_dt_err='starting_date is required';
            }else{
               $a_start_dt=$_POST["starting_date"];
            }
            if(empty($_POST["ending_date"])){
                $a_job_end_err='ending_date is required';
            }else{
               $a_job_end=$_POST["ending_date"];
            }
            if(empty($_POST["project_title"])){
                $a_pjt_err='project_title is required';
            }else{
               $a_pjt=$_POST["project_title"];
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
        $sql = "INSERT INTO `education`(`User_Id`, `College_Name`, `Degree`, `Feild`, `Starting_date`, `Ending_Date`, `Project_Title`, `About_Project`) VALUES (".$_SESSION['user_id'].",'$a_clg','$a_job' , '$a_job_loc', '$a_start_dt', '$a_job_end','$a_pjt', '$a_abt')";
        //$a_clg_err=$a_clg=$a_job_err=$a_job=$a_job_loc_err=$a_job_loc=$a_start_dt_err=$a_start_dt_err=$a_start_dt=$a_job_end_err=$a_job_end= $a_abt_err= $a_abt='';

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header('Location: Dashboard.php');
        // exit;
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Education</title>
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
                        <p style="font-size:50px; color:white">Add Education</p>
						
					</span>
                </div>
                <br><br>
                <form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="form">
                
                 
                
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="College Name is required">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">College Name</span>
                        <input class="input100"  style="color:Black" type="text" name="college"  placeholder="Enter college name">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Degree is required">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">Degree</span>
                        <input class="input100" type="text" name="job_title"  placeholder="Enter your degree"  style="color:Black">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Filed is required">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">Field</span>
                        <input class="input100" type="text" name="job_location"  placeholder="Enter the Feild you are studying"  style="color:Black">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-26" data-validate="Starting date is required">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">Starting Date</span>
                        <input class="input100" type="date" name="starting_date"  style="color:Black">
                        <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 m-b-26 ">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">Ending Date</span>
                        <input class="input100" type="date" name="ending_date"  style="color:Black">
                        <span class="focus-input100"></span>
                </div>

                <div class="contact100-form-checkbox m-b-26" >
							<input class="input-checkbox100" id="ckb1" type="checkbox" onclick="check()">
							<label class="label-checkbox100"  style=" font-size:15px; font-weigth:1000;"  for="ckb1">
								Project
							</label>
				</div>
                <div class="wrap-input100 m-b-26 " id="project1" style="display:none;">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">Project Title</span>
                        <input class="input100" type="text" name="project_title"  style="color:Black">
                        <span class="focus-input100"></span>
                </div>
                

                <div class="wrap-input100 m-b-26" id="project2" style="display:none;">
						<span class="label-input100" style=" font-size:15px; font-weigth:1000;">About Your Project</span>
                        <input class="input100" type="textarea" name="about"  style="color:Black" placeholder="Tell something about your project">
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


</body>

<script>
    function check(){
    
    var checkBox = document.getElementById("ckb1");
        if(checkBox.checked==true){
                            document.getElementById('project1').style.display = 'block';
                            document.getElementById('project2').style.display = 'block'; 
                        }
                        else{
                            
                            document.getElementById('project1').style.display = 'none';
                            document.getElementById('project2').style.display = 'none'; 
                        }
    }
</script>
</html>
