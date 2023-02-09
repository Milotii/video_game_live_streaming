

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
  <header>
  <a href="../dashboard/dashboard.php">Dashboard</a>
</header>
    
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="users.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
   <br>
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
  </tbody>

</table>

<script>
  function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
      window.location.href = "delete.php?id=" + id;
    }
  }
</script>


</body>
</html>