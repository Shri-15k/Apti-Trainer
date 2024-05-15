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

        <h3 style="text-align: center; margin-top: 20px;">Registered Users List :</h3>
        <hr>




        <div class="content">
          <?php
          $sql = "SELECT * FROM `registered_users` WHERE username != 'Admin';";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          ?>
            <table class="table table-border">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Email Id</th>
                  <th>Verified</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $counter = 0;
                while ($row = mysqli_fetch_array($result)) {
                  $counter++;
                ?>
                  <tr>
                    <td><?php echo $row["full_name"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["is_verified"]; ?></td>
                    <td>
                      <a href="delete_user.php?id=<?php echo $row["username"]; ?>" class="btn btn-danger" name="delete">Delete</a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          <?php
          } else {
            echo "No users found.";
          }
          ?>


<!-- code to view topics list and categories -->

<h3 style="text-align: center; margin-top: 40px;">Aptitude Topics List :</h3>
        <hr>

        <div class="content">
          <?php
          $sql = "SELECT topics.topic_name, category.cat_name, category.cat_id
          FROM topics
          JOIN category ON topics.cat_id = category.cat_id;";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          ?>
            <table class="table table-border" style="margin:20px;">
              <thead>
                <tr>
                  <th>Topic Name</th>
                  <th>Category</th>
                  <th>Cat ID</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $counter = 0;
                while ($row = mysqli_fetch_array($result)) {
                  $counter++;
                ?>
                  <tr>
                    <td><?php echo $row["topic_name"]; ?></td>
                    <td><?php echo $row["cat_name"]; ?></td>
                    <td><?php echo $row["cat_id"]; ?></td>
                    <td>
                      <a href="delete_topic.php?id=<?php echo $row["topic_name"]; ?>" class="btn btn-danger" name="delete_topic">Delete</a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          <?php
          } else {
            echo "No Topics found.";
          }
          ?>

<!-- code to view listed componies starts here -->

<div style="display: flex; align-items: center; justify-content: center;">
    <h3 style="margin-top: 40px; margin-bottom: 0;">Compony List :</h3>
    <header class="d-flex justify-content-between my-4" style="margin-bottom: 0;">
        <div>
            <a href="create.php" class="btn btn-primary">Add New Compony Details</a>
        </div>
    </header>
</div>

        <hr>

        <div class="content">
          <?php
          $sql = "SELECT *
          FROM mnc_info;";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          ?>
            <table class="table table-border" style="margin:20px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Compony Name</th>
                  <th>Category</th>
                  <th>Website</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $counter = 0;
                while ($row = mysqli_fetch_array($result)) {
                  $counter++;
                ?>
                  <tr>
                  <td><?php echo $row["comp_id"]; ?></td>
                    <td><?php echo $row["comp_name"]; ?></td>
                    <td><?php echo $row["comp_category"]; ?></td>
                    <td><?php echo $row["comp_website"]; ?></td>
                    <td>
                    <a href="edit_comp.php?id=<?php echo $row["comp_id"]; ?>" class="btn btn-warning">Edit</a>
                      <a href="delete_comp.php?id=<?php echo $row["comp_id"]; ?>" class="btn btn-danger" name="delete_topic">Delete</a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          <?php
          } else {
            echo "No Componies found.";
          }
          ?>

<!-- code to view listed componies ends here -->
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