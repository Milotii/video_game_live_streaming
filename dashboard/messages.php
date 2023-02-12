<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="messages.css">
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
        <span class="admin_name">Miloti</span>
        <i class='bx bx-chevron-down'></i>

      </div>
    </nav>
    <div class="home-content">
      <table>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Datetime</th>
          <th>Message</th>
        </tr>
        <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "videogamelivestreaming_db";

        try {
          $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
          $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "";
          $query = "SELECT * FROM contact_us";
          $stmt = $con->prepare($query);
          $stmt->execute();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "</tr>";
          }
        } catch (PDOException $e) {
          echo "Connection Failed " . $e->getMessage();
        }
        ?>
      </table>
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