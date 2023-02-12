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

include '../database/database.php';
$b = new database();
$id = $_GET['id'];
$b->select("categories", "*", "id='$id'");
$result = $b->sql;
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>

<head>
    <title>CSGO Clips</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../css/shared.css">
</head>

<body>
    <header class="site-header">
        <div class="site-identity">
            <div class="wrapper">
                <div class="logo"></div>
            </div>
            <a href="../home/home.php"> <img src="../home/logo4.jpg"
                    style="width:33%; height: auto; max-width:125px;" /></a>
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

        <br>
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])): ?>
            <p> <strong>
                    <?php echo $_SESSION['username']; ?>
                </strong> <br>
                <br>
                <a href="../home/home.php?logout='1'" style="color: red;">Logout</a>
            </p>
        <?php endif ?>
    </header>
    <br>
    <div class="content">
        <img src="../images/<?php echo $row['image']; ?>" alt="">
        <h3>
  
        </h3>
        <p>
            <?php echo $row['description']; ?>
        </p>
    </div>
    <style>
    .content {
  display: flex;
  align-items: center;
  padding: 20px;
}

.content img {
  width: 200px;
  height: 200px;
  margin-right: 20px;
}

.content h3 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 170px;
}

.content p {
  font-size: 15px;
}

 </style>
    <h3>
        <?php echo $row['name']; ?> Clips
    </h3>

    <?php
    $b->select("gameVideos", "*", "gameId='$id'");
    $result = $b->sql;
    ?>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <video width="400px" height="263px" controls="controls">
            <source src="../images/<?php echo $row['video']; ?>" type="video/mp4">
        </video>
    <?php
    } ?>
</body>

</html>