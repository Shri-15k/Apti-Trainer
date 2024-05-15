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

        <!-- code to edit comp details starts here -->

        <?php

        if (isset($_GET["id"])) {
          $id = $_GET["id"];
          $sql = "SELECT * FROM mnc_info WHERE comp_id='$id'";
          $result = mysqli_query($con, $sql);
          $row = mysqli_fetch_array($result);

        ?>

          <form action="process.php?id=<?php echo $id; ?>" method="post">
            <div class="form-element my-4">
              <input type="text" class="form-control" name="comp_name" placeholder="Compony Name" value="<?php echo $row["comp_name"]; ?>">
            </div>

            <div class="form-element my-4">
              <input type="text" class="form-control" name="comp_img" placeholder="Image Path" value="<?php echo $row["comp_img"]; ?>">
            </div>

            <div class="form-element my-4">
              <input type="text" class="form-control" name="comp_description" placeholder="Compony Description" value="<?php echo $row["comp_description"]; ?>">
            </div>

            <div class="form-element my-4">
              <input type="text" class="form-control" name="comp_apti" placeholder="Compony Aptitude Format" value="<?php echo $row["comp_apti"]; ?>">
            </div>

            <div class="form-element my-4">
              <input type="text" class="form-control" name="comp_website" placeholder="Compony Website Link" value="<?php echo $row["comp_website"]; ?>">
            </div>

            <div class="form-element my-4">
              <select name="comp_category" class="form-control">
                <option value="">Select Compony Category</option>
                <option value="Product" <?php if ($row['comp_category'] == "Product") {
                                          echo "selected";
                                        } ?>>Product</option>
                <option value="Service" <?php if ($row['comp_category'] == "Service") {
                                          echo "selected";
                                        } ?>>Service</option>
                <option value="Startup" <?php if ($row['comp_category'] == "Startup") {
                                          echo "selected";
                                        } ?>>Startup</option>
                <option value="Research" <?php if ($row['comp_category'] == "Research") {
                                            echo "selected";
                                          } ?>>Research</option>
                <option value="Datacenter" <?php if ($row['comp_category'] == "Datacenter") {
                                              echo "selected";
                                            } ?>>Datacenter</option>
              </select>
            </div>

            <input type="hidden" name="id" value="<?php echo $row['comp_id']; ?>">
        <div class="form-element">
            <input type="submit" class="btn btn-success" name="edit_comp" value="Edit Compony">
        </div>


          </form>
        <?php
        }

        ?>

        <!-- code to edit comp details ends here -->
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