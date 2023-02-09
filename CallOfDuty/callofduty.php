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
        <title>Call Of Duty Clips</title>
        <link rel="stylesheet" href="callofduty.css">
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
                <img src="cod.jpg" alt="" >
                <h3>Call of Duty</h3>
                <p>Lojtari ka dy slota kryesore për armë, një vend për pistoletë
                     dhe mund të mbajë deri në tetë granata (të gjitha lojërat e 
                     mëvonshme Call of Duty përmbajnë vetëm dy lojëra elektronike 
                     për armë; një krah do të mbushë njërën nga këto vende). 
                     Armët mund të shkëmbehen me ato që gjenden në fushën e betejës 
                     të hedhura nga ushtarët e vdekur.</p>
            </div>
            <h3>Call Of Duty Clips</h3>
            <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="A6XMauEQSmOCHKdq7MkK8w.mp4"
            type="video/mp4">
    </video>
    
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="GseSQACoqtNpMODJLJgixw.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="q3J03tbHwKmyxm0u0DxFrQ.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="bAN88spCTQ0sT5IZJuMyIA.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="MCXrEHLeJIc_uyWDFOVbVw.mp4"
            type="video/mp4">
    </video>
    <video width="400px" height="263px"
        controls="controls"/>
         
        <source src="zjSDJLmqS--lta_64SxmXw.mp4"
            type="video/mp4">

    
    </video>
</body>
</html>