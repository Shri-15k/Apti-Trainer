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
    <title>MNC</title>
    <link rel="stylesheet" href="../../resources/CSS/style.css">
    <link rel="stylesheet" href="../../resources/CSS/MNC.css">
    <link rel="stylesheet" href="../../resources/CSS/sidenav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../../resources/JS/MNC.js"></script>

</head>

<body>
    <header>
        <?php
        $path = '../..';
        include ("$path/components/nav_header.php");
        ?>
    </header>

    <main>
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
          if($_SESSION['username']=="Admin"){

            //code goes here

          }else {
            echo "
            <script>alert('Sorry ! You are not admin');
            window.location.href='../Home/Home.php';
            </script>
            ";
        }
      } else {
        echo "
        <script>alert('Please LogIn!');
        window.location.href='../../index.php';
        </script>
        ";
    }
    ?>
</main>
</body>

</html>
            
            