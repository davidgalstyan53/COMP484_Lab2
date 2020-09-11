<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Successful!</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <style media="screen">
      body
      {
        background-color: black;
        font-family: "Roboto", sans-serif;
        font-size: 12px;
      }

      p
      {
        color: white;
        text-align: center;
        margin:0 auto;
      }

      h3
      {
        font-family: "Times New Roman", sans-serif;
        color: white;
        text-align: center;
        margin:0 auto;
      }
    </style>

    <?php

        if(!isset($_POST['submitRegistration']))
        {
          echo "<h3>You're not supposed to be here</h3>";
          echo "<h3>Sending you back home...</h3>";
          header("refresh:5, url=./index.php");
          die();
        }

     ?>
  </head>
  <body>
    <?php
      session_start();

      if(isset($_POST['submitRegistration']))
      {
        $dbhandler = mysqli_connect("localhost","root","","siteusers");
        $name = $_POST['username'];
        $password = $_POST['password'];
        $passwordVerified = $_POST['passwordVerified'];

        if(empty($name) || empty($password) || empty($passwordVerified))
        {
          echo "<h3>You didn't fill all the fields</h3>";
          echo "<h3>Sending you back home...</h3>";
          header("refresh:5, url=./index.php");
          die();
        }
        elseif(!preg_match("/^[a-zA-Z0-9]/", $name))
        {
          echo "<h3>Username can only contain numbers and letters</h3>";
          echo "<h3>Sending you back home...</h3>";
          header("refresh:5, url=./index.php");
          die();
        }
        elseif($password !== $passwordVerified)
        {
          echo "<h3>Your passwords didn't match</h3>";
          echo "<h3>Sending you back home...</h3>";
          header("refresh:5, url=./index.php");
          die();
        }
        else
        {
          $sql = "SELECT * FROM users WHERE name = '$name'";
          $result = mysqli_query($dbhandler,$sql);
          if(mysqli_num_rows($result) >= 1)
          {
            echo "<h3>'$name' already exists</h3>";
            echo "<h3>Sending you back home...</h3>";
            header("refresh:5, url=./index.php");
            die();
          }
          else
          {
            //$passwordHash = password_hash("$password", PASSWORD_DEFAULT);
            $insertSql = "INSERT INTO `users`(`name`, `password`) VALUES ('$name', '$password')";
            mysqli_query($dbhandler,$insertSql);
            $_SESSION["userName"] = $name;
            echo "<p>New User: '$name' Created Successfully!</p>";
            echo "<p>Redirecting in 5 seconds...";

            header("refresh:5, url=./reg-user-page.php");
          }
        }
      }
      else
      {
        die();
      }
    ?>
  </body>
</html>
