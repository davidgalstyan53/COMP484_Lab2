<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome!</title>
  </head>
  <body>
    <div id="register-section">
      <div id="register-form">
        <form id="register-box" action="./register.php" method="POST">
          <p id="welcomeNewUser">Welcome!<br/>Fill out the form below to get started.</p>
          <input type="text" name="username" placeholder="Enter a Username..."><br><br>
          <input type="password" name="password" placeholder="Enter a Password..."><br><br>
          <input type="password" name="passwordVerified" placeholder="Verify Password..."><br><br>
          <button type="submit" name="submitRegistration">Register User</button>
        </form>
      </div>
    </div>
  </body>
</html>
