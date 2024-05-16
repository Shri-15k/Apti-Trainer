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
    <!-- code to add new question starts here -->

    <div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Add New Question To Quiz Database</h1>
        <div>
            <a href="Admin.php" class="btn btn-primary">Back</a>
        </div>
    </header>
    <form action="process.php" method="post">

    <div class="form-element my-4">
            <select name="topic_category" class= "form-control">
                <option value="">Select Topic Category</option>
                <option value="Quantitative Aptitude">Quantitative Aptitude</option>
                <option value="Verbal Ability">Verbal Ability</option>
                <option value="Logical Reasoning">Logical Reasoning</option>
                <option value="Verbal Reasoning">Verbal Reasoning</option>
                <option value="Non Verbal Reasoning">Non Verbal Reasoning</option>
                <option value="Data Interpretation">Data Interpretation</option>
            </select>
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="topic" placeholder="Topic Name">
        </div>

        <div class="form-element my-4">
            <select name="level" class= "form-control">
                <option value="">Select Difficulty Level</option>
                <option value="easy">easy</option>
                <option value="medium">medium</option>
                <option value="hard">hard</option>
            </select>
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="question" placeholder="Write Question">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="optionA" placeholder="Option A">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="optionB" placeholder="Option B">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="optionC" placeholder="Option C">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="optionD" placeholder="Option D">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="answer" placeholder="Correct Answer">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="solution" placeholder="Detailed Solution">
        </div>

        <div class="form-element my-4">
            <input type="text" class= "form-control" name="images" placeholder="Path of question image / leave blank">
        </div>

        <div class="form-element">
            <input type="submit" class="btn btn-success" name="create_quiz" value="Add Question To Database">
        </div>
    </form>
</div>
    <!-- code to add question end here -->
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