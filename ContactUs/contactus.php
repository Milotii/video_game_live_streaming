<?php 

    $server="localhost";
    $username="root";
    $password="";
    $database="videogamelivestreaming_db";

    try{
        $con = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "";
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $date = date("Y-m-d H:i:s");
            $query = "INSERT INTO contact_us (username, email, message, date) VALUES ('$username', '$email', '$message', '$date')";
            $stmt = $con->prepare($query);
            $stmt->execute();
            echo "Data Inserted Successfully.";
        }
    }catch(PDOException $e){
        echo "Connection Failed ".$e->getMessage();
    }

?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="en" dir="ltr">

<head>
  <title>Video Game Live Streaming</title>
  <link rel="stylesheet" href="contactus.css">
</head>

<body>
  <div class="center">
    <h1>Contact Us</h1>
    <form name="contactForm" method="post" onsubmit="return validateForm()" action="">
      <div class="txt_field">
        <label>Username</label>
        <input type="text" name="username">
      </div>
      <span id="username"></span>
      <br />   <br />

      <div class="txt_field">
        <label>Email</label>
        <input type="email" name="email">
      </div>
      <span id="email"></span>
      <br />   <br />

     

      <textarea name="message" class="message" placeholder="Write a message"></textarea>
      <span id="message"></span>

      <br>
      <br> <input type="submit" name="submit" value="Submit"> <br> <br>
      <br>
    </form>
  </div>

  <script>
    function validateForm() {
    let username = document.forms["contactForm"]["username"].value;
    let email = document.forms["contactForm"]["email"].value;
    let message = document.forms["contactForm"]["message"].value;
    var isValid = true;


    if (username == "") {
        document.getElementById("username").innerHTML = "Username must be filled!";
        isValid = false;
    }



    if (email == "") {
        document.getElementById("email").innerHTML = "Email must be filled!";
        isValid = false;
    }


    if (message == "") {
        document.getElementById("message").innerHTML = "Please write a message!";
        isValid = false;
    }

    if (isValid) {
        alert("Message sent successfully!");
    }

    return isValid;
}

document.getElementsByName('username')[0].addEventListener('keydown', function (event) {
    document.getElementById("username").innerHTML = "";
});

document.getElementsByName('email')[0].addEventListener('keydown', function (event) {
    document.getElementById("email").innerHTML = "";
});

document.getElementsByName('message')[0].addEventListener('keydown', function (event) {
    document.getElementById("message").innerHTML = "";
});
  </script>

</body>

</html>