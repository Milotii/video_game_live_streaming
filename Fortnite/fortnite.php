<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../login/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../login/login.php");
  }
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
        <title>Fortnite Clips</title>
        <link rel="stylesheet" href="fortnite.css">
        <link rel="stylesheet" href="../css/shared.css">
    </head>

    <body>  
        <body>
            <header class="site-header">
                <div class="site-identity">
                  <div class="wrapper">
                    <div class="logo"></div>
                  </div>
                  <a href="../home/home.php" > <img src="logo4.jpg" style="width:33%; height: auto; max-width:125px;"/></a>
                
               
                  <h1><a href="../home/home.php">epicStream</a></h1>
                </div>  
                <nav class="site-navigation">
                  <ul class="nav">
                  </ul>
                </nav>
                <div class="wrap">
                  <div class="search">
                     <input type="text" class="searchTerm" placeholder="Search...">
                     <button type="submit" class="searchButton">
                      <div id='button-holder'>
                        <img src='search1.png' />
                    </div>
                       <i class="fa fa-search"></i>
                    </button>
                  </div>
               </div>
                               	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p> <strong><?php echo $_SESSION['username'];  ?></strong> <br>
      <br> 
    	<a href="../home/home.php?logout='1'" style="color: red;">Logout</a> </p>
    <?php endif ?>
                
              </header>
              <br>
              <div class="content">
                <img src="955dd42a-4516-4049-a8c5-0a37e17e4c0e-profile_image-150x150.png" alt="" >
                <h3>Fortnite</h3>
                <p>Një lojë falas me shumë lojtarë ku konkurroni në Battle Royale,
                     bashkëpunoni për të krijuar ishullin tuaj privat në Creative
                      ose kërkimin në Save the World.</p>
            </div>
            <h3>Fortnite Clips</h3>
            <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="kGvkeD_uCNYdXldzGQjL-w.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="8baRn9N3nGKf5WIPKOrk6Q.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="xBM1SEyQGbyI3Dw1HL8STg.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="yDI8wMLTZpKQDHxJBaxd1A.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="7vV_eIjngUYaZpD5v6tSCA.mp4"
            type="video/mp4">
    </video>


        </body>
        </html>
        