<?php
// Establish a connection to the database
$server = "localhost";
$username = "root";
$password = "";
$database = "videogamelivestreaming_db";

try {
  $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection Failed " . $e->getMessage();
}

// The target directory of uploading is uploads
$target_dir = "../../images/";
$uOk = 1;

if (isset($_POST["submit"])) {
  $gameId = $_GET['id'];

  // Count # of uploaded files in array
  $total = count($_FILES['files']['name']);

  // Loop through each file
  for ($i = 0; $i < $total; $i++) {

    //Get the temp file path
    $tmpFilePath = $_FILES['files']['tmp_name'][$i];

    //Make sure we have a file path
    if ($tmpFilePath != "") {
      $video_name = guidv4() . "_" . basename($_FILES["files"]["name"][$i]);
      $target_file = $target_dir . $video_name;
      if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
        // Insert data into the categories table
        try {
          // Prepare the SQL statement
          $stmt = $con->prepare("INSERT INTO gameVideos (gameId, video) VALUES (:gameId, :video)");

          // Bind the values to the placeholders in the SQL statement
          $stmt->bindValue(':gameId', $gameId, PDO::PARAM_INT);
          $stmt->bindValue(':video', $video_name, PDO::PARAM_STR);

          // Execute the SQL statement
          $stmt->execute();
        } catch (PDOException $e) {
          $error_message = $e->getMessage();
          echo "<script>alert('$error_message');</script>";
        }
        echo "<script>alert('Videos addedd successfully!');</script>";
      } else {
        echo "<script>alert('Something went wrong, please try again!!');</script>";
      }
    }
  }
}

function guidv4($data = null)
{
  // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
  $data = $data ?? random_bytes(16);
  assert(strlen($data) == 16);

  // Set version to 0100
  $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
  // Set bits 6-7 to 10
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

  // Output the 36 character UUID.
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

include '../../database/database.php';
$b = new database();
$id = $_GET['id'];
$b->select("categories", "*", "id='$id'");
$result = $b->sql;
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../dashboard.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    form {
      width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      box-sizing: border-box;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    .home-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      height: 100vh;
    }

    .overview-boxes {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 50px;
    }

    img {
      width: 500px;
      height: 300px;
      object-fit: cover;
      border: 1px solid #ccc;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }

    label,
    input[type="submit"] {
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <?php include '../menu.php'; ?>

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search'></i>
      </div>
      <div class="profile-details">
        <!--<img src="images/profile.jpg" alt="">-->
        <span class="admin_name">Miloti</span>
        <i class='bx bx-chevron-down'></i>

      </div>
    </nav>
    <div class="home-content">
      <div class="overview-boxes">
        <div class="content">
          <img src="../../images/<?php echo $row['image']; ?>" alt="">
          <h3>
            <?php echo $row['name']; ?>
          </h3>

          <form action="" method="post" enctype="multipart/form-data">
            <label for="image">Videos:</label>
            <input type="file" name="files[]" id="files" multiple>
            <input type="submit" name="submit" value="Submit">
          </form>
        </div>
  </section>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

</body>

</html>