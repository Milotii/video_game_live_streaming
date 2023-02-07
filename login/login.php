<?php include('server.php') ?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="en" dir="ltr">

<head>
  <title>Video Game Live Streaming</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="center">
    <h1>Login</h1>
    <form name="loginForm" class="loginForm" method="post" onsubmit="return validateForm()" action="login.php">
    <?php include('errors.php'); ?>
    
      <div class="txt_field">
        <label>Username</label>
        <input type="text" name="username">
      </div>

      <span id="username"></span>
      <br />   <br />
      <div class="txt_field">
        <label>Password</label>
        <input type="password" name="password">
      </div>

      <span id="password"></span>
   
      <br />

      <input type="submit" class="btn" name="login_user" value="Login">


  
      <div class="signup_link">
        Not a member? <a href="../register/register.php">Register</a>
      </div>
    </form>
  </div>

  <script src="login.js"></script>
</body>

</html>