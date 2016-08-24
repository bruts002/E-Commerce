<!DOCTYPE>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Adming Login</title>
  <link rel="stylesheet" href="styles/login_style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Admin Login</h1>
      <form method="post">
        <p><input type="text" name="email" value="" placeholder="Email"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="login" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="login.php">Click here to reset it</a>.</p>
    </div>
  </section>

</body>
</html>

<?php
session_start();

include("../includes/db.php");

if (isset($_POST['login'])) {
  //$email = mysql_real_escape_string($con, $_POST['email']);
  //$pass = mysql_real_escape_string($con, $_POST['password']);
  $email = mysql_real_escape_string($_POST['email']);
  $pass = mysql_real_escape_string($_POST['password']);

  $sel_user = "SELECT * FROM admins WHERE user_email='$email' AND user_pas='$pass'";
  $run_user = mysqli_query($con, $sel_user);
  $check_user = mysqli_num_rows($run_user);

  if ($check_user==0) {
    echo "<script>alert('Email or password not found!');</script>";
  } else {
    $_SESSION['user_email']=$email;
    echo "<script>window.open('index.php?logged_in=You have successfully logged in!','_self');</script>";
  }

}



?>