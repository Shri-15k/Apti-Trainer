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
  <link rel="stylesheet" href="../../resources/CSS/discussion.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../resources/CSS/style.css">
</head>

<header>
  <?php $path = "../..";
  include("../../components/nav_header.php"); ?>
</header>

<body style="background-color:#f0f1ee;">

  <?php
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
  ?>
    <!--my code goes here -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <br>
    <div class="center-container">
        <h2 class="discuss">
            <span>Connect</span>
            <span>Discuss</span>
            <span>Resolve</span>
        </h2>
    </div>
    <br>

    <div class="card-container">
        <div class="card">
            <img src="../../resources/images/img_avatar.png" alt="Avatar" style="width: 100%;">
            <div class="container">
                <h4><b>Mihir Patki</b></h4>
                <p>Quantitative Expert</p>
            </div>
        </div>

        <div class="card">
            <img src="../../resources/images/img_avatar2.png" alt="Avatar" style="width: 100%;">
            <div class="container">
                <h4><b>Sakshi Maskar</b></h4>
                <p>Reasoning Expert</p>
            </div>
        </div>

        <div class="card">
        <img src="../../resources/images/img_avatar.png" alt="Avatar" style="width: 100%;">
        <div class="container">
            <h4><b>Shriraj Khochage</b></h4> 
            <p>Verbal Expert</p> 
        </div>
    </div>

    <div class="card">
        <img src="../../resources/images/img_avatar.png" alt="Avatar" style="width: 100%;">
        <div class="container">
            <h4><b>Tanay Chougale</b></h4> 
            <p>Non-verbal Expert</p> 
        </div>
    </div>

    <div class="card">
        <img src="../../resources/images/img_avatar2.png" alt="Avatar" style="width: 100%;">
        <div class="container">
            <h4><b>Aarya teli</b></h4> 
            <p>Logical Expert</p> 
        </div>
    </div>

    <div class="card">
        <img src="../../resources/images/img_avatar.png" alt="Avatar" style="width: 100%;">
        <div class="container">
            <h4><b>Soham Page</b></h4> 
            <p>DI Expert</p> 
        </div>
    </div>

    </div>

    <br>
    <div class="container">
        <?php
        $datas = mysqli_query($con, "SELECT * FROM tb_data WHERE reply_id=0");
        foreach ($datas as $data) {
            require 'comment.php';
        }
        ?>

        <form action="" method="post">
            <h2 id="title" style="text-align: center;">Ask your doubts</h2>
            <br>
            <input type="hidden" name="reply_id" id="reply_id">
            <input type="text" name="name" placeholder="Enter your name">
            <textarea name="comment" placeholder="Write your doubts"></textarea>
            <button type="submit" name="submit" class="submit" style="margin: 0 auto;">Submit</button>
        </form>
    </div>

    <script>
        function reply(id, name) {
            title = document.getElementById('title');
            title.innerHTML = "Reply to " + name;
            document.getElementById('reply_id').value = id;
        }
    </script>

  <?php } else {
    echo "
        <script>alert('Please LogIn!');
        window.location.href='../../index.php';
        </script>
        ";
  } ?>
</body>

</html>