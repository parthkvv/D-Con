<?php
session_start();
?>

<?php
    if(isset($_POST['profile'])){
        header("location:profile.php");
    }
    if(isset($_POST['experience'])){
        header("location:experience.php");
    }
    if(isset($_POST['education'])){
        header("location:education.php");
    }
    if(isset($_POST['delete_account'])){
      $servername="localhost";
        $username="root";
        $password="";
        $dbname="admin";
        // Create connection
        $con = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($con->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql="delete from profile where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
        
        $sql="delete from education where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
        
        $sql="delete from experience where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
        
        $sql="delete from admin where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
        
        $sql="delete from comments where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
        
        $sql="delete from developers where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
        
        $sql="delete from post where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
    }
    if(isset($_POST['delete_profile'])){
      $servername="localhost";
        $username="root";
        $password="";
        $dbname="admin";
        // Create connection
        $con = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($con->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql="delete from profile where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
        
        $sql="delete from education where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
        
        $sql="delete from experience where User_Id=".$_SESSION['user_id'];
        $con->query($sql);
    }
?>

<!doctype html>
<html lang="en">

  <head>
    <title>D-Conn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <style>
    table, td, th {
            padding: 15px;
            border-bottom: 3px solid grey;
            
            }

            table {
            width: 100%;background-color: #ffffff; opacity: 0.6;
            }

            th {
            height: 50px;
            text-align: center;
            font-size: 20px;
            font-weight: 1000;

            }
            td{
                text-align: center;
                font-size: 16px;
                font-weight: 1000;
                color: #5f5f5f;
            }
    </style>
    


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

            <div class="col-3">
              <div class="site-logo">
                <a href="home.php"><strong>D-Connector</strong></a>
              </div>
            </div>
            <div class="col-3">
              <div class="site-logo">
                <a href="developers.php"><strong>Developer</strong></a>
              </div>
            </div>

            <div class="col-6  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                <?php
                if($_SESSION['user']=='admin'){
                            echo '<li><a href="admin_dashboard.php" class="nav-link"><strong> Admin Dashboard</strong></a></li>';
                          }?>
                  <li><a href="home.php" class="nav-link"><strong>Home</strong></a></li>
                  <li class="active"><a href="dashboard.php" class="nav-link"><strong>Dashboard</strong></a></li>
                  <li><a href="post.php" class="nav-link"><strong>Post</strong></a></li>
                  
                </ul>
              </nav>
            </div>
            <br><br>
        </div>
        <div>
                <a href="dashboard.php"><h1 style="color:white; font-weight: 1000;"><strong>Dashboard</strong></h1></a>
                <?php
                        if(isset($_COOKIE["user"])){
                            echo '<h3 style="color:white; font-weigth:900"><strong><bold>Welcome '.strtoupper($_COOKIE["user"]).'</bold></strong></h3>';

                        }
                        elseif(isset($_SESSION['admin'])){
                            echo '<h3 style="color:white;"><strong><bold>Welcome '.strtoupper($_SESSION["admin"]).'</bold></strong></h3>';
                        }
                    ?>
                    <br>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                        <input type="submit" value="Edit Profile" name='profile'>
                        <input type="submit" value="Add Experience" name='experience'>
                        <input type="submit" value="Add Education" name='education'>
                    </form>
                    
                    <br><br><br>
                    <div>
                        <h2 style="color:white; font-weigth:1000"><strong>Experience Credentials</strong></h2>
                        <table style="color:black">
                            <tr style="font-weigth:bold;">
                                <th>Company</th>
                                <th>Title</th>
                                <th>Year</th>
                            </tr>
                           
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Company_Name,Job_Tittle, DATE_FORMAT(Job_Ending_date, '%Y') AS Job_Ending_date FROM experience where User_Id=".$_SESSION['user_id'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
 
    while($row = $result->fetch_assoc()) {
      echo "</tr>" ;
      echo "<td>";
        echo  $row["Company_Name"];
           echo "</td>";
              echo "<td>";
        echo  $row["Job_Tittle"];
           echo "</td>";
              echo "<td>";
        echo  $row["Job_Ending_date"];
           echo "</td>";
           echo "</tr>" ;
    }
    
} else {
    echo "0 results";
}

$conn->close();
?>                                       
                        </table>
             
                    </div>
                    <br><br><br>
                    <div>
                        <h2 style="color:white; font-weigth:1000"><strong>Education Credentials</strong></h2>
                        <table style="color:black">
                            <tr style="font-weigth:bold;">
                                <th>College</th>
                                <th>Degree</th>
                                <th>Field</th>
                            </tr>
                           
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT College_Name,Degree, Feild FROM education where User_Id=".$_SESSION['user_id'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
 
    while($row = $result->fetch_assoc()) {
      echo "</tr>" ;
      echo "<td>";
        echo  $row["College_Name"];
           echo "</td>";
              echo "<td>";
        echo  $row["Degree"];
           echo "</td>";
              echo "<td>";
        echo  $row["Feild"];
           echo "</td>";
           echo "</tr>" ;
    }
    
} else {
    echo "0 results";
}

$conn->close();
?>            
                        </table>
                    </div>
              </div>        
          </div>

      </header>

    </div>

  </body>

</html>
