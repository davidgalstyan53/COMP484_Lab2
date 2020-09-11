<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lab 2 Homepage</title>
    <link rel="stylesheet" type="text/css" href="./lab2.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">


    <?php
      if(isset($_SESSION["userName"])) //If a user session is already started, user will be redirected to appropriate page
      {
        if($_SESSION["userName"] == "Administrator")
        {
          header("Location: ./secretAdminPage.php");
        }
        else
        {
          header("Location: ./reg-user-page.php");
        }
      }
     ?>



    <script type="text/javascript"> //Switching between forms on main page

      function openReg()
      {
        registerSection.style["display"] = "block";
        loginSection.style["display"] = "none";
        oldOrNew.style["display"] = "none";
      }

      function openLogin()
      {
        registerSection.style["display"] = "none";
        loginSection.style["display"] = "block";
        oldOrNew.style["display"] = "none";
      }

      function returnToStart()
      {
        registerSection.style["display"] = "none";
        loginSection.style["display"] = "none";
        oldOrNew.style["display"] = "block";
      }




      function init()
      {
        var registerSection = document.getElementById("registerSection");
        var loginSection = document.getElementById("loginSection");
        var registerSection = document.getElementById("registerSection");

      }

      window.addEventListener("load", init);
    </script>

  </head>
  <body>
    <div id="registerOrLogin">
      <div id="pickForm">
        <form id="oldOrNew" name ="oldOrNew" action="./index.php" method="post">
          <p id="pickEm">Hello.<br>Are you a new user, or existing user?</p>
          <button type="button" id="pickNew" onclick="openReg()" checked>New User</button>
          <button type="button" id="pickOld" onclick="openLogin()">Existing User</button>
        </form>
      </div>
    </div>

    <div id="registerSection" display="none">
      <div id="registerForm">
        <form id="registerBox" action="./register.php" method="POST">
          <p id="welcomeNewUser">Welcome!<br/>Fill out the form below to get started.</p>
          <input type="text" name="username" placeholder="Enter a Username..." required><br><br>
          <input type="password" name="password" placeholder="Enter a Password..." required><br><br>
          <input type="password" name="passwordVerified" placeholder="Verify Password..." required><br><br>
          <button type="submit" name="submitRegistration">Register User</button>
          <br><br><br><br>
        </form>
        <button type="submit" name="backToStart" onclick="returnToStart()">I changed my mind...</button>
      </div>
    </div>

    <div id="loginSection">
      <div id="loginForm">
        <form id="loginBox" action="./login.php" method="POST">
          <p id="welcomeBackUser">Welcome back!<br>Please log in.</p>
          <input type="text" name="username1" placeholder="Username" required><br><br>
          <input type="password" name="password1" placeholder="Password" required><br><br>
          <button type="submit" name="submitLogin">Login</button>
          <br><br><br><br>
        </form>
        <button type="submit" name="backToStart" onclick="returnToStart()">I changed my mind...</button>
      </div>
    </div>

  </body>
</html>
