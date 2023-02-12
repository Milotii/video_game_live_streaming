<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="users.css">
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
        <span class="admin_name">Milot Hoti</span>
        <i class='bx bx-chevron-down'></i>

      </div>
    </nav>
    <div class="home-content">
    <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      try {
        $con = new PDO("mysql:host=localhost;dbname=videogamelivestreaming_db;", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $con->prepare("SELECT * FROM users");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["username"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td><button onclick='deleteUser(" . $row["id"] . ")'>Delete</button></td>";
          echo "</tr>";
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    ?>
  

</table>
    </div>
  </section>

  <script>
  function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
      window.location.href = "delete.php?id=" + id;
    }
  }
</script>

</body>

</html>