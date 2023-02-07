<?php include('server.php') ?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="en" dir="ltr">

<head>
  <title>Video Game Live Streaming</title>
  <link rel="stylesheet" href="register.css">
</head>

<body>
  <div class="center">
    <h1>Register</h1>
    <form name="registerForm" method="post" onsubmit="return validateForm()" action="register.php">
    <?php include('errors.php'); ?>

      <div class="txt_field">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
      </div>

      <span id="username"></span>

      <br />   <br />
      <div class="txt_field">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
      </div>

      <span id="email"></span>

      <br />   <br />
      <div class="txt_field">
        <label>Password</label>
        <input type="password" name="password_1">
      </div>

      <span id="password_1"></span>

      <br />   <br />
      <div class="txt_field">
        <label>Confirm Password</label>
        <input type="password" name="password_2">
      </div>

      <span id="password_2"></span>

      <br />   <br />
      <input type="submit" class="btn" name="reg_user" value="Register">

      <div class="signup_link">
        Already have an account? <a href="../login/login.php">Log In</a>
      </div>

      
  </div>
  </form>
  </div>

  <script src="register.js"></script>
</body>

</html>