<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome Back!</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

  </head>
  <body>
    <div id="login-section">
      <div id="login-form">
        <form id="login-box" action="./login.php" method="post">
          <p id="welcomeBackUser">Welcome back!<br>Please log in.</p>
          <input type="text" name="username" placeholder="Username"><br><br>
          <input type="password" name="username" placeholder="Password"><br><br>
          <button type="submit" id="submitLogin">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
