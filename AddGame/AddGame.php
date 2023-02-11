<?php
    // Establish a connection to the database
    $server="localhost";
    $username="root";
    $password="";
    $database="videogamelivestreaming_db";

    try{
        $con = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Connection Success";
    }catch(PDOException $e){
        echo "Connection Failed ".$e->getMessage();
    }

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Get the form data
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $video = file_get_contents($_FILES['video']['tmp_name']);

        // Insert data into the categories table
        try {
            // Prepare the SQL statement
            $stmt = $con->prepare("INSERT INTO categories (name, description, image, video) VALUES (:name, :description, :image, :video)");

            // Bind the values to the placeholders in the SQL statement
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':image', $image, PDO::PARAM_LOB);
            $stmt->bindValue(':video', $video, PDO::PARAM_LOB);

            // Execute the SQL statement
            $stmt->execute();

            echo "Data inserted successfully";
        } catch (PDOException $e) {
            echo "Insert failed: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="AddGame.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
    <body>
    <br> <br>
    <a href="../dashboard/dashboard.php">Go to Dashboard</a>
  <!-- HTML form for user input -->
<form action="" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">

    <label for="description">Description:</label>
    <input type="text" name="description" id="description">

    <label for="image">Image:</label>
    <input type="file" name="image" id="image">

    <label for="video">Video:</label>
    <input type="file" name="video" id="video">

    <input type="submit" name="submit" value="Submit">
</form>

    </body>
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
  a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
  }

  a:hover {
    background-color: #3E8E41;
  }

</style>

</html>