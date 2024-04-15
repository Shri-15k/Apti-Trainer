<?php
require ('../../db/connection.php');
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
        include ("$path/components/nav_header.php");
        ?>
    </header>
    <main>
    <?php
        if (isset($_GET['data'])) {
          $data = unserialize(urldecode($_GET['data'])); // Decode and parse the data
          echo $data;
          
        } else {
          echo "No data found in URL parameters.";
        } 
    ?>
    </main>
</body>
</html>