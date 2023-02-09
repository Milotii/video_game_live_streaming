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
        <title>About Us</title>
        <link rel="stylesheet" href="aboutUs.css">
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
              <div class="about-section">
                <h1>About Us</h1>
                <p>epicStream është vendi ku miliona njerëz mblidhen së bashku jetojnë çdo ditë për të biseduar,
                     bashkëvepruar dhe për të bërë argëtimin e tyre së bashku. Tifoz të paturpshëm,
                      mirë se vini në shtëpi. Shiko atë që të pëlqen, lidhu me transmetuesit dhe 
                      bisedo me shumë komunitete. Gati për të krijuar lidhje reale me një audiencë 
                      të madhe dhe të angazhuar? Ne kemi disa milionë miq që do të dëshironim që të njihni.</p>
              </div>
              
              <h2 style="text-align:center">Our Team</h2>
              <div class="row">
                <div class="column">
                  <div class="card">
                    <img src="1551448883046.jpeg" style="width:30%">
                    <div class="container">
                      <h2>Fisnik Ibishi</h2>
                      <p class="title">CEO & Founder</p>
                      <p>Ai është një njeri i thjeshtë që i pëlqen gjërat e thjeshta, i pëlqen kafeja dhe biseda me kolegët. Ai ka shumë eksperiencë</p>
                      <p>fisnikibishi@gmail.com</p>
                      <p><button class="button">Contact</button></p>
                    </div>
                  </div>
                </div>
              
                <div class="column">
                  <div class="card">
                    <img src="1662563094028.jpeg" style="width:30%">
                    <div class="container">
                      <h2>Milot Hoti</h2>
                      <p class="title">CEO & Founder</p>
                      <p>I pëlqen të gatuajë. Pjata e tij e njohur është spageti i bërë vetë dhe ushqimi tradicional. Ai është fleksibil dhe mjaft kreativ.</p>
                      <p>milot@gmail.com</p>
                      <p><button class="button">Contact</button></p>
                    </div>
                  </div>
                </div>
              
                
              </div>
            </body>
        </html>