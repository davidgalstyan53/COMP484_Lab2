<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Regular User Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <style media="screen">

      body
      {
        background-color: black;
        font-family: "Roboto", sans-serif;
        font-size: 20px;
      }

      p
      {
        color:white;
      }

      #changeColor
      {
        width: 100px;
        height: 50px;
      }

      #myBox
      {
        text-align: center;
        margin: 0 auto;
        margin-top: 15%;

      }

      input
      {
        font-family: "Roboto", sans-serif;
        border-radius: 10px;
        box-sizing: border-box;
        font-size: 14px;
        padding: 10px;
        cursor: pointer;
      }


    </style>

    <?php
      if(!isset($_SESSION["userName"]))
      {
        header("Location: ./index.php");
      }
     ?>

    <script type="text/javascript">

      function changeBackgroundColor()
      {
        var rgb1 = Math.floor(Math.random() * 256);
        var rgb2 = Math.floor(Math.random() * 256);
        var rgb3 = Math.floor(Math.random() * 256);
        var newBackground = "rgb(" + rgb1 + "," + rgb2 + "," + rgb3 + ")";
        document.body.style.background = newBackground;

      }

    </script>
  </head>
  <body>
    <div id="myBox">
      <?php
        print "<p>Welcome! Here's your special button!</p>
              <p>Let's see what it does...</p>";
       ?>
       <input type="button" id="changeColor" onclick="changeBackgroundColor()" value="CLICK ME"></input>
       <br><br><br><br>
       <a href="./logout.php">Logout</a>

       <?php
          if($_SESSION["userName"] == "Administrator") //Creates button for Admin user to go back to Admin page
          {
            echo "<br /><br />";
            echo "<a href='secretAdminPage.php'>Admin Page</a>";
          }
        ?>
    </div>

  </body>
</html>
