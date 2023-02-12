<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="dashboard.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'menu.php'; ?>
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


      </div>
    </nav>
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Users</div>
            <div class="number">
              <?php
              $conn = mysqli_connect("localhost", "root", "", "videogamelivestreaming_db");
              $sql = "SELECT COUNT(*) as total_users FROM users";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
              echo $data['total_users'];
              ?>
            </div>
          </div>
          <i class='bx bx-user cart four'></i>
        </div>
              <?php
                $sql = "SELECT COUNT(*) as count FROM categories";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $count = $row["count"];
            }
        } else {
            echo "0 results";
        }
        ?>
              <div class="box">
          <div class="right-side">
            <div class="box-topic">Game Categories</div>
            <div class="number"><?php echo $count; ?></div>
          </div>
          <i class='bx bx-category cart two'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Messages</div>
            <div class="number">
              <?php
              $server = "localhost";
              $username = "root";
              $password = "";
              $database = "videogamelivestreaming_db";

              try {
                $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "";
                $query = "SELECT COUNT(*) FROM contact_us";
                $stmt = $con->prepare($query);
                $stmt->execute();
                $count = $stmt->fetchColumn();
                echo $count;
              } catch (PDOException $e) {
                echo "Connection Failed " . $e->getMessage();
              }
              ?>
            </div>
          </div>
          <i class='bx bx-message cart three'></i>
        </div>

        <div class="box">
          <div class="right-side">
            <div class="box-topic">Today New Users</div>
            <div class="number">0</div>
          </div>
          <i class='bx bx-user cart'></i>
        </div>
      </div>

      <div class="users-boxes">
        <div class="recent-users box">
          <div class="title">Recent Users</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">ID</li>
              <?php
              $conn = mysqli_connect("localhost", "root", "", "videogamelivestreaming_db");
              $sql = "SELECT id, username, email FROM users ORDER BY id DESC LIMIT 6";
              $result = mysqli_query($conn, $sql);
              while ($data = mysqli_fetch_assoc($result)) {
                echo "<li><a href='#'>" . $data['id'] . "</a></li>";
              }
              ?>
            </ul>
            <ul class="details">
              <li class="topic">Username</li>
              <?php
              $result = mysqli_query($conn, $sql);
              while ($data = mysqli_fetch_assoc($result)) {
                echo "<li><a href='#'>" . $data['username'] . "</a></li>";
              }
              ?>
            </ul>
            <ul class="details">
              <li class="topic">Email</li>
              <?php
              $result = mysqli_query($conn, $sql);
              while ($data = mysqli_fetch_assoc($result)) {
                echo "<li><a href='#'>" . $data['email'] . "</a></li>";
              }
              ?>
            </ul>
          </div>
          <br>
          <div class="button">
            <a href="users.php">See All</a>
          </div>
        </div>

        <!----------------------------------------------------------------->
        <div class="recent-users box">


          <div class="title"> Messages</div>

          <div class="sales-details">
            <ul class="details">
              <li class="topic">DateTime </li>
              <?php
              $conn = mysqli_connect("localhost", "root", "", "videogamelivestreaming_db");
              $sql = "SELECT date, username, email FROM contact_us ORDER BY id DESC LIMIT 6";
              $result = mysqli_query($conn, $sql);
              while ($data = mysqli_fetch_assoc($result)) {
                echo "<li><a href='#'>" . $data['date'] . "</a></li>";
              }
              ?>
            </ul>
            </ul>
            <ul class="details-column">
              <li class="topic">Email</li>
              <?php
              $result = mysqli_query($conn, $sql);
              while ($data = mysqli_fetch_assoc($result)) {
                echo "<li><a href='#'>" . $data['email'] . "</a></li>";
              }
              ?>
            </ul>
          </div>
          <br>
          <div class="button">
            <a href="messages.php">See All</a>
          </div>
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