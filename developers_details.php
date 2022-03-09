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
?>

<?php
    if(isset($_POST['developers'])){
        header("location:developers.php");
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
        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="home.php"><strong></strong></a>
              </div>
            </div>
            <div class="col-3">
              <div class="site-logo">
                <a href="developers.php"><strong></strong></a>
              </div>
            </div>

            
            <br><br>
        </div>
        <div>
                <a href=""><h1 style="color:white; font-weight: 1000;"><strong>Developers Profile</strong></h1></a>
                <?php
                        $sql="Select Name from profile where User_Id=".$_GET['user_id'];
                        $result=$con->query($sql);
                        if ($result->num_rows>0) {
                            while ($row=$result->fetch_assoc()) {
                                echo '<h1 style="color:white;"><strong><bold>'.strtoupper($row['Name']).'</bold></strong></h3>';

                            }
                        }
                    ?>
                    <br>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                        <input type="submit" value="Back To Developers Page" name='developers'>
                    </form>
                    
                    <br><br><br>
                    <div>
                        <h2 style="color:white; font-weigth:1000"><strong>About</strong></h2>
                        <table style="color:black">
                            <?php
                                $sql="select  `Name`, `Status`,`City`, `State`, `Skills`, `About_You`, `LinkedIn_Profile`, `Github_Profile` FROM `profile` WHERE  User_Id=".$_SESSION['user_id'];
                                $result=$con->query($sql);
                                while ($rows=$result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<th style="font-weigth:bold;">Name</th>';
                                    echo '<td>'.$rows['Name'].'</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th style="font-weigth:bold;">Status</th>';
                                    echo '<td>'.$rows['Status'].'</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th style="font-weigth:bold;">City</th>';
                                    echo '<td>'.$rows['City'].'</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th style="font-weigth:bold;">Skills</th>';
                                    echo '<td>'.$rows['Skills'].'</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th style="font-weigth:bold;">About</th>';
                                    echo '<td>'.$rows['About_You'].'</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th style="font-weigth:bold;">LinkedIn Profile</th>';
                                    echo '<td><a style="color:grey" href="'.$rows['LinkedIn_Profile'].'">'.$rows['LinkedIn_Profile'].'</a></td>';
                                    echo '</tr>';
                                    echo '<th style="font-weigth:bold;">Github Profile</th>';
                                    echo '<td><a style="color:grey" href="'.$rows['Github_Profile'].'">'.$rows['Github_Profile'].'</a></td>';
                                    echo '</tr>';
                                }
                                
                            ?>
                        </table>
                    </div>
                    <br><br><br>
                    <div>
                        <h2 style="color:white; font-weigth:1000"><strong>Experience Credentials</strong></h2>
                        <table style="color:black">
                            <tr style="font-weigth:bold;">
                                <th>Company</th>
                                <th>Job Title</th>
                                <th>Job Location</th>
                                <th>About Job</th>
                            </tr>
                            <?php
                                $sql="select `Company_Name`, `Job_Tittle`, `Job_Location`,`About_job` FROM `experience` WHERE User_Id=".$_GET['user_id'];
                                $result=$con->query($sql);
                                while ($rows=$result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>'.$rows['Company_Name'].'</td>';
                                    echo '<td>'.$rows['Job_Tittle'].'</td>';
                                    echo '<td>'.$rows['Job_Location'].'</td>';
                                    echo '<td>'.$rows['About_job'].'</td>';
                                    echo '</tr>';
                                }
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
                                <th>Project</th>
                                <th>About Project</th>
                            </tr>
                            <?php
                                $sql="select `College_Name`, `Degree`, `Feild`,`Project_Title`, `About_Project` FROM `education` WHERE User_Id=".$_GET['user_id'];
                                $result=$con->query($sql);
                                while ($rows=$result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>'.$rows['College_Name'].'</td>';
                                    echo '<td>'.$rows['Degree'].'</td>';
                                    echo '<td>'.$rows['Feild'].'</td>';
                                    echo '<td>'.$rows['Project_Title'].'</td>';
                                    echo '<td>'.$rows['About_Project'].'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <p>
                    </div>
                        <div class="container">
                                    <div id="list">
                                     <h3 style="color:White;"> <strong>Repos</strong> </h3>
                                          <ul class="noBullet" id="userRepos">
                                           </ul>
                         </div>
                     </div>
                     </p>
                    <br><br>              </div>        
          </div>

      </header>

    </div>

    <script>
//console.log(2)
 <?php echo "console.log(2);"?>
function requestUserRepos(username){

    const xhr = new XMLHttpRequest();
    const url = `https://api.github.com/users/${username}/repos`;
    xhr.open('GET', url, true);
    xhr.onload = function() {
        const data = JSON.parse(this.response);
        for(let i in data) {
            let ul = document.getElementById('userRepos');
            let li = document.createElement('li');
            li.classList.add('list-group-item');
            li.innerHTML = (`
            <p>Repo: ${data[i].name}</p>
            <p>Description: ${data[i].description}</p>
            <p>URL: <a style="color:black" href="${data[i].html_url}">${data[i].html_url}</a></p>
            `);
            ul.appendChild(li);
        }
    }
    xhr.send();   
}
<?php
 $sql="select  `Github_Profile` FROM `profile` WHERE  User_Id=".$_SESSION['user_id'];
 $result=$con->query($sql);
 while ($rows=$result->fetch_assoc()) {
     
  //   echo 'requestUserRepos('.$rows['Github_Profile'].'.split("/")[3]'.');';
  echo 'var test="'.$rows['Github_Profile'].'";';
 }
?>
 var id=test.split('/')[3];
 console.log(id);

 requestUserRepos(id);
</script>
  </body>


</html>
