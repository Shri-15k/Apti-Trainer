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
  <title>Home</title>
  <link rel="stylesheet" href="../../resources/CSS/style.css">

  <link rel="stylesheet" href="../../resources/CSS/home.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body style="background-color:#f0f1ee;">
  <header>
    <?php
    $path = '../..';
    include("$path/components/nav_header.php");
    ?>
  </header>
  <main>
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      // Your code for when the user is logged in goes here
      echo "<h1 style='text-align: center; margin-top: 50px;'> Welcome  To Apti-Trainer ! $_SESSION[username]</h1>"; ?>

      <h1 class="heading">Students Choice For Aptitude Preparation !</h1>
      <div class="container" style="display:block">
        <div class="row1" style="display:flex; justify-content: space-around; margin-bottom: 50px;">
          <div class="box">
            <ion-icon class="icons" name="list-outline"></ion-icon>
            <h2><a href="../Notes/Notes.php">Topicwise Practice</a></h2>
            <p>Practice Topicwise
              Questions
              And Improve
              Your Performance</p>
          </div>

          <div class="box">
            <ion-icon class="icons" name="stopwatch-outline"></ion-icon>
            <h2><a>Topicwise Quiz</a></h2>
            <p>Attempt quizzes with timers,Receive instant scores and Correct solutions </p>
          </div>

          <div class="box">
            <ion-icon class="icons" name="book-outline"></ion-icon>
            <h2><a>Mock Tests</a></h2>
            <p>Attempt
              Mock Test
              And
              Challenge Your
              Solving Speed</p>
          </div>
        </div>

        <div class="row2" style="display: flex; justify-content: space-around;">
          <div class="box">
            <ion-icon class="icons" name="document-text-outline"></ion-icon>
            <h2><a href="../Notes/Notes.php">Topicwise Notes</a></h2>
            <p>Empower your
              learning journey
              with
              our notes.</p>
          </div>

          <div class="box">
            <ion-icon class="icons" name="cash-outline"></ion-icon>
            <h2><a href="../MNC/MNC.php">Compony Aptitude Details</a></h2>
            <p>Understand compoony criteria and prepare accordingly</p>
          </div>

          <div class="box">
            <ion-icon class="icons" name="chatbubble-ellipses-outline"></ion-icon>
            <h2><a>Discussion Forum</a></h2>
            <p> Facilitate meaningful conversations & Clarify your doubts with Experts</p>
          </div>

        </div>
      </div><!-- close container -->

      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <?php
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