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

        <!-- code to view questions list starts here -->

        <div style="display: flex; align-items: center; justify-content: center;">
          <h3 style="margin-top: 40px; margin-bottom: 0;">Quiz Questions List :</h3>
          <header class="d-flex justify-content-between my-4" style="margin-bottom: 0;">
            <div>
              <a href="create_quiz.php" class="btn btn-primary">Add New Question To Quiz</a>
            </div>
          </header>

          <div>
            <a href="Admin.php" class="btn btn-primary">Back</a>
          </div>
        </div>

        <hr>

        <div class="content">
          <?php
          $sql = "SELECT *
          FROM quiz;";
          $result = mysqli_query($con, $sql);
          if (mysqli_num_rows($result) > 0) {
          ?>
            <table class="table table-border" style="margin:20px;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Topic Name</th>
                  <th>Category</th>
                  <th>Question</th>
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
                    <td><?php echo $row["tag"]; ?></td>
                    <td><?php echo $row["topic"]; ?></td>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php echo $row["question"]; ?></td>
                    <td>
                      <a href="view_quiz.php ?id=<?php echo $row["tag"]; ?>" class="btn btn-info">Read More</a>
                      <a href="edit_quiz.php?id=<?php echo $row["tag"]; ?>" class="btn btn-warning">Edit</a>
                      <a href="delete_quiz.php?id=<?php echo $row["tag"]; ?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>

            <?php echo "$counter" ?>
          <?php
          } else {
            echo "No Questions Found In The Database";
          }
          ?>
          <!-- code to view questions list end here -->
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