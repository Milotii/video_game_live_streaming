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
  <title>GTA Clips</title>
  <link rel="stylesheet" href="gta.css">
  <link rel="stylesheet" href="../css/shared.css">
</head>

<body>

  <body>
    <header class="site-header">
      <div class="site-identity">
        <div class="wrapper">
          <div class="logo"></div>
        </div>
        <a href="../home/home.php"> <img src="logo4.jpg" style="width:33%; height: auto; max-width:125px;" /></a>


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
      <img src="gta2.jpg" alt="">
      <h3>Grand Theft Auto V</h3>
      <p>Grand Theft Auto V është një lojë e gjerë botërore e hapur e vendosur
        në Los Santos, një metropol i përhapur i njomur nga dielli që lufton
        për të qëndruar në këmbë në një epokë pasigurie ekonomike dhe realitet
        televiziv të lirë. Loja ndërthur tregimin dhe lojën në mënyra të reja
        ndërsa lojtarët vazhdimisht hidhen dhe dalin nga jeta e tre personazheve
        kryesore të lojës, duke luajtur të gjitha anët e historisë së ndërthurur të lojës.</p>
    </div>
    <h3>GTA Clips</h3>
    <video width="400px" height="263px" controls="controls" />

    <source src="vRqH78kXOO-Y91h1aeoXYg.mp4" type="video/mp4">
    </video>
    <video width="400px" height="263px" controls="controls" />

    <source src="ymZJ1Av0BFFZvX6oLrXlwQ.mp4" type="video/mp4">
    </video>
    <video width="400px" height="263px" controls="controls" />

    <source src="8k2puZKvt2iiyN4j7CW2tw.mp4" type="video/mp4">
    </video>
    <video width="400px" height="263px" controls="controls" />

    <source src="4QsjTN_Q99MV5jwEA3pn4g.mp4" type="video/mp4">
    </video>
    <video width="400px" height="263px" controls="controls" />

    <source src="YvCpoRuflFfflN6yuQWrLg.mp4" type="video/mp4">
    </video>


  </body>

</html>