<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Successful!</title>
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

        if(!isset($_POST['submitLogin']))
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

      if(isset($_POST['submitLogin']))
      {
        $dbhandler = mysqli_connect("localhost","root","","siteusers");
        $name = $_POST['username1'];
        $password = $_POST['password1'];

        if(empty($name) || empty($password))
        {
          echo "<p>Looks like you didn't fill in all the fields</p>";
          echo "<p>Let's take you back home...";
          header("refresh:3, url= ./index.php");
          die();
        }
        else
        {
          $sqlSelectName = "SELECT * FROM users WHERE name='$name'";
          $sqlSelectPass = "SELECT * FROM users WHERE password='$password' AND name='$name'";
          $result = mysqli_query($dbhandler,$sqlSelectName);
          if(mysqli_num_rows($result) > 0)
          {
            $result = mysqli_query($dbhandler,$sqlSelectPass);
            if(mysqli_num_rows($result) > 0)
            {
              if($name == 'Administrator')
              {
                session_start();
                $_SESSION["userName"] = $name;
                echo "<p>Welcome back $name!</p>";
                echo "<p>One moment, just loading up your page...";
                header("refresh:3, url= ./secretAdminPage.php");
              }
              else
              {
                session_start();
                $_SESSION["userName"] = $name;
                echo "<p>Welcome back $name!</p>";
                echo "<p>One moment, just loading up your page...";

                header("refresh:3, url=./reg-user-page.php");
              }
            }
            else
            {
              echo "<p>Sorry, your password was incorrect</p>";
              echo "<p>Let's take you back home...";
              header("refresh:3, url= ./index.php");
              die();
            }
          }
          else
          {
            echo "<p>Sorry, no such user was found</p>";
            echo "<p>Let's take you back home...";
            header("refresh:3, url= ./index.php");
            die();
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
