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
  <title>Admin</title>
  <link rel="stylesheet" href="../../resources/CSS/style.css">
  <link rel="stylesheet" href="../../resources/CSS/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



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
      if ($_SESSION['username'] == "Admin") {
        // Code goes here
    ?>
    <!-- code to add new compony starts here -->

    <div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Add new Compony Details</h1>
        <div>
            <a href="manage_quiz.php" class="btn btn-primary">Back</a>
        </div>
    </header>
    <form action="process.php" method="post">
        <div class="form-element my-4">
            <input type="text" class= "form-control" name="comp_name" placeholder="Compony Name">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="comp_img" placeholder="Path For Saved image ">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="comp_description" placeholder="About Compony">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="comp_apti" placeholder="Compony Aptitdue Format">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="comp_website" placeholder="Compony Website Link">
        </div>

        <div class="form-element my-4">
            <select name="comp_category" class= "form-control">
                <option value="">Select Compony Category</option>
                <option value="Product">Product</option>
                <option value="Service">Service</option>
                <option value="Startup">Startup</option>
                <option value="Datacenter">Datacenter</option>
                <option value="Research">Research</option>
            </select>
        </div>

        <div class="form-element">
            <input type="submit" class="btn btn-success" name="create_comp" value="Add Compony Details">
        </div>
    </form>
</div>
    <!-- code to add compony end here -->
    <?php
      } else {
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