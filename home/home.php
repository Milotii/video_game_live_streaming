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
  
  // Connect to the database
  $db = mysqli_connect('localhost', 'root', '', 'videogamelivestreaming_db');

  // Get the username from the session
  $username = $_SESSION['username'];

  // Query the database to get the user's role
  $query = "SELECT role FROM users WHERE username='$username'";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);

  // Store the user's role in a session variable
  $_SESSION['role'] = $user['role'];

  // Check if the user is an admin
  if ($_SESSION['role'] == 'admin') {
    // Show admin-only content
  } else {
    // Show regular user content
  }
?>

<!DOCTYPE html>
<html>

<head>
  <title>VideoGameLiveStreaming</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="../css/shared.css">
</head>

<body>
  <header class="site-header">
    <div class="site-identity">
      <div class="wrapper">
        <div class="logo"></div>
      </div>
      <a href="home.php"> <img src="logo4.jpg" style="width:33%; height: auto; max-width:125px;" /></a>


      <h1><a href="home.php">epicStream</a></h1>
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
          <i class="fa fa-search"></i> <br>
        </button>
      </div>
    </div>
    <br>

    <br>
    <div class="content">
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
    <a href="../dashboard/dashboard.php" 
  <?php if ($_SESSION['role'] === "admin" ): ?>
    style="display:block" 
  <?php else: ?>
    style="display:none"
  <?php endif; ?>
>Dashboard</a> 


    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="home.php?logout='1'" style="color: red;">Logout</a> </p>
    <?php endif ?>

  </header>
  <div id="slider">
    <figure>
      <img src="ss_d196d945c6170e9cadaf67a6dea675bd5fa7a046.1920x1080.jpg" alt="Image">
      <img src="00-featured-mercedes-c63-car-mod-gta5.jpg" alt="Image">
      <img src="fortnite-battleroyale-blogroll-1522177042308_160w.jpg" alt="Image">
      <img src="new_era-mw2.jpg" alt="Image">
      <img src="capsule_616x353.jpg" alt="Image">
      <img src="0_23.jpg" alt="Image">
    </figure>
    <div class="indicator"></div>
  </div>
  </section>
  <br>
  <h3 id="categories">Categories</h3>
  <br>
  <div class="container">
  <?php 
       include '../database/database.php';
       $b = new database();
       $b->select("categories","*");
       $result = $b->sql;
   ?>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <a href="../game/index.php?id=<?php echo $row['id']; ?>"><img src="../images/<?php echo $row['image']; ?>"></a>
  <?php
  }?>
  </div>
  </div>
  <br>
</body>
<footer>
  <section class="footer">
    <div class="social">
      <a href="https://www.instagram.com/"><img src="insta.png"
          style="width:100%; height: 100%; max-width:125px;" /></a>
      <a href="https://www.snapchat.com/"><img src="5a4e30ff2da5ad73df7efe74.png"
          style="width:100%; height: 100%; max-width:125px;" /></a>
      <a href="https://www.twitter.com/"><img src="5a2fe479cc45e43754640849.png"
          style="width:100%; height: 100%; max-width:125px;" /></a>
      <a href="https://www.facebook.com/"><img src="face.png" style="width:100%; height: 100%; max-width:125px;" /></a>
    </div>


    <ul class="list">
      <li>
        <a href="home.php">Home</a>
      </li>
      <li>
        <a href="../AboutUs/aboutUs.php">About Us</a>
      </li>
      <li>
        <a href="../ContactUs/contactus.php">Contact Us</a>
      </li>
    </ul>
  </section>
</footer>

</html>