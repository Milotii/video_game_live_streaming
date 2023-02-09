<?php
  try {
    $con = new PDO("mysql:host=localhost;dbname=videogamelivestreaming_db;", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $con->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(":id", $_GET["id"]);
    $stmt->execute();
    header("Location: users.php");
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
?>
