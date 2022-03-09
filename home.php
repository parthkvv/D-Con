<?php
session_start();
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
                  <li class="active"><a href="home.html" class="nav-link"><strong>Home</strong></a></li>
                  
                    <?php
                        if(isset($_COOKIE["user"])){
                          if($_SESSION['user']=='admin'){
                            echo '<li><a href="admin_dashboard.php" class="nav-link"><strong> Admin Dashboard</strong></a></li>';
                          }
                            echo '<li><a href="dashboard.php" class="nav-link"><strong>Dashboard</strong></a></li>';
                            echo '<li><a href="post.php" class="nav-link"><strong>Post</strong></a></li>';
                            echo '<li><a href="logout.php" class="nav-link"><strong>Log Out</strong></a></li>';
                            echo '<div class="site-logo"><h3 style="color:white;"><strong><bold>'.strtoupper($_COOKIE["user"]).'</bold></strong></h3></div>';

                        }
                        elseif(isset($_SESSION['admin'])){
                            if($_SESSION['user']=='admin'){
                              echo '<li><a href="admin_dashboard.php" class="nav-link"><strong> Admin Dashboard</strong></a></li>';
                            }
                            echo '<li><a href="dashboard.php" class="nav-link"><strong>Dashboard</strong></a></li>';
                            echo '<li><a href="post.php" class="nav-link"><strong>Post</strong></a></li>';
                            echo '<li><a href="logout.php" class="nav-link"><strong>Log Out</strong></a></li>';
                            echo '<div class="site-logo"><h2 style="color:white;"><strong><bold>'.strtoupper($_SESSION["admin"]).'</bold></strong></h2></div>';

                        }
                        else{
                            echo '<li><a href="login.php" class="nav-link"><strong>Log In</strong></a></li>';
                        }
                    ?>
                        

                  <!-- <li><a href="testimonials.html" class="nav-link">Testimonials</a></li>
                  <li><a href="blog.html" class="nav-link">Blog</a></li>
                  <li><a href="about.html" class="nav-link">About</a></li>
                  <li><a href="contact.html" class="nav-link">Contact</a></li> -->
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

      
      <div class="site-section-cover" >
        
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-10 text-center">
                    <h1><strong>DEVELOPER CONNECTOR</strong></strong></h1>
                    <h4 style="color:white;">Create a Developer Profile/Portfolio, Share Posts and Get Help From Other Developers</h2>
                    </div>
                </div>
            </div>
      </div>
    </div>

  </body>

</html>

