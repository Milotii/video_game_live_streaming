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
        <img src="csgo2.jpg" alt="">
        <h3>
            <?php echo $row['name']; ?>
        </h3>
        <p>
            <?php echo $row['description']; ?>
        </p>
    </div>
    <h3>
        <?php echo $row['name']; ?> Clips
    </h3>
    <video width="400px" height="263px" controls="controls" />

    <source src="117889605_329937131691881_3521263818198931672_n.mp4" type="video/mp4">
    </video>

    <video width="400px" height="263px" controls="controls" />

    <source src="9oxYxhlmXfvfO7Ua2E7rgA.mp4" type="video/mp4">
    </video>
    <video width="400px" height="263px" controls="controls" />

    <source src="UaCAN_sTPRtiQWP3dQMKfg.mp4" type="video/mp4">
    </video>
    <video width="400px" height="263px" controls="controls" />

    <source src="TGIaw4D7rSwZvqodir0zRQ.mp4" type="video/mp4">
    </video>
    <video width="400px" height="263px" controls="controls" />

    <source src="dt45F_7lRNQ31Ld1W4wR_g.mp4" type="video/mp4">
    </video>
</body>

</html>