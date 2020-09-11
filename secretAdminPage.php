<?php
  session_start();
  if($_SESSION["userName"] != "Administrator") // Markup won't even load if not Admin
  {
    header("Location: ./index.php");
    die();
  }
  else
  {

  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Page</title>

    <style media="screen">

      body
      {
        background-color: black;
      }

      table, th, td
      {
        color: white;
        border: 1px solid white;
        margin: 0 auto;
        width: 25%;
      }

      #anchor
      {
        text-align: center;
      }


    </style>

  </head>

  <body>

    <table>
      <tbody>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>pass</th>
        </tr>
        <?php
          $dbhandler = mysqli_connect("localhost","root","","siteusers");
          $sql = "SELECT id, name, password FROM users ORDER BY name ASC";
          $result = mysqli_query($dbhandler,$sql);

          while ($row = mysqli_fetch_row($result))

            {
              print("<tr><td>");
              print($row[0]);
              print("</td><td>");
              print($row[1]);
              print("</td><td>");
              print($row[2]);
              print("</td></tr>");
            }

            mysqli_close($dbhandler);
        ?>
      </tbody>
    </table>
    <br><br><br><br>
    <div id="anchor">
      <a href="./logout.php">Logout</a>
      <br><br>
      <a href="./reg-user-page.php">Regular User Page</a>
    </div>
  </body>
</html>
