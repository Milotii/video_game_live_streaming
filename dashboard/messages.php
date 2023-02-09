<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
  <header>
  <a href="../dashboard/dashboard.php">Dashboard</a>
</header>
    
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="messages.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
   <br>
   <table>
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Datetime</th>
    <th>Message</th>
  </tr>
  <?php 
    $server="localhost";
    $username="root";
    $password="";
    $database="videogamelivestreaming_db";
  
    try{
      $con = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      echo "";
      $query = "SELECT * FROM contact_us";
      $stmt = $con->prepare($query);
      $stmt->execute();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['message'] . "</td>";
        echo "</tr>";
      }
    }catch(PDOException $e){
      echo "Connection Failed ".$e->getMessage();
    }
  ?>
</table>
</body>
</html>