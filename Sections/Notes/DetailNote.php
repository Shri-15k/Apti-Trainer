<?php
require('../../db/connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notes</title>
  <link rel="stylesheet" href="../../resources/CSS/style.css">
  <link rel="stylesheet" href="../../resources/CSS/sidenav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="../../resources/CSS/Notes.css">
  <script src="../../resources/JS/Notes.js" defer></script>
</head>

<body>
  <header>
    <?php
    $path = '../..';
    include("$path/components/nav_header.php");
    ?>
  </header>
  <main>

    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>
    <?php
      if (isset($_GET['data'])) {
        $data = $_GET['data']; // Decode and parse the data

        // Debugging: Print the received data
        //echo "Received data: $data <br>";

        // Ensure $data is not empty and contains only alphanumeric characters
        if (!empty($data)) {
          $sql = "SELECT view_notes FROM `notes` WHERE notes_name = ?";
          $stmt = mysqli_prepare($con, $sql);
          mysqli_stmt_bind_param($stmt, "s", $data);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);

          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo $row['view_notes'];
          } else {
            echo 'No Notes Found For The Topic';
          }

          mysqli_stmt_close($stmt);
        } else {
          echo 'Invalid data received.';
        }
      } else {
        echo 'No data found in URL parameters.';
      }
    } else {
      echo "
        <script>alert('Please LogIn!');
        window.location.href='../../index.php';
        </scrip>
        ";
    }
    ?>
  </main>
</body>

</html>