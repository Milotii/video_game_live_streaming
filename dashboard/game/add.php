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
  $name = $_POST['name'];
  $description = $_POST['description'];

  // Check if $uOk is set to 0 
  if ($uOk == 0) {
    echo "Your file was not uploaded.<br>";
  }

  // if uOk=1 then try to upload file
  else {
    if (strlen($_FILES['files']['name']) > 1) {
      $image_name = guidv4() . "_" . basename($_FILES["files"]["name"]);
      $target_file = $target_dir . $image_name;
      if (move_uploaded_file($_FILES['files']['tmp_name'], $target_file)) {
        // Insert data into the categories table
        try {
          // Prepare the SQL statement
          $stmt = $con->prepare("INSERT INTO categories (name, description, image) VALUES (:name, :description, :image)");

          // Bind the values to the placeholders in the SQL statement
          $stmt->bindValue(':name', $name, PDO::PARAM_STR);
          $stmt->bindValue(':description', $description, PDO::PARAM_STR);
          $stmt->bindValue(':image', $image_name, PDO::PARAM_STR);

          // Execute the SQL statement
          $stmt->execute();
        } catch (PDOException $e) {
          $error_message = $e->getMessage();
          echo "<script>alert('$error_message');</script>";
        }
        echo "<script>alert('Category addedd successfully!');</script>";
      } else {
        echo "<script>alert('Something went wrong, please try again!!');</script>";
      }
    }
  }
}

function guidv4($data = null) {
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
        <span class="admin_name">Milot Hoti</span>
        <i class='bx bx-chevron-down'></i>

      </div>
    </nav>
    <div class="home-content">
      <div class="overview-boxes">
        <form action="" method="post" enctype="multipart/form-data">
          <label for="name">Name:</label>
          <input type="text" name="name" id="name">

          <label for="description">Description:</label>
          <input type="text" name="description" id="description">

          <label for="image">Image:</label>
          <input type="file" name="files" id="files">

          <input type="submit" name="submit" value="Submit">
        </form>
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