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
        <title>FIFA Clips</title>
        <link rel="stylesheet" href="fifa.css">
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
                <img src="fifa23.jpg" alt="" >
                <h3>FIFA</h3>
                <p>FIFA sjell lojën e botës në fushë, me Teknologjinë HyperMotion2 
                    që ofron edhe më shumë realizëm të lojës, Kupa e Botës FIFA për 
                    meshkuj dhe femra që vjen gjatë sezonit, ekipe të klubeve të 
                    femrave, veçori të lojërave të kryqëzuara dhe më shumë.</p>
            </div>
            <h3>FIFA Clips</h3>
            <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="Hbs-fUNaFojfqBK88l4ZBg.mp4"
            type="video/mp4">
    </video>
    
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="j_gSRVCYvU3JonH5Q9ehCg.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="kp7sr9IRITq9uFdEmKEakg.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="CXVsIqwavB6HcnIA0RBIsA.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="HAnvjs5C-Ak3qQm1xUj9ww.mp4"
            type="video/mp4">
    </video>

</body>
</html>