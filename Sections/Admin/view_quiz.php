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
    <!-- code to view question details -->

    <div class="container">
<header class="d-flex justify-content-between my-4">
        <h3>View Full Question Details :</h3>
        <div>
            <a href="manage_quiz.php" class="btn btn-primary">Back</a>
        </div>
    </header>

    <div class="book-details my-4">
        <?php 
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $sql="SELECT * FROM quiz WHERE tag=$id";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($result);
                ?>

<div style="display: flex; justify-content: space-between;">
    <div>
        <h3>Category</h3>
        <p><?php echo $row["category"]; ?></p>
    </div>
    <div>
        <h3>Topic Name</h3>
        <p><?php echo $row["topic"]; ?></p>
    </div>
    <div>
        <h3>Level</h3>
        <p><?php echo $row["level"]; ?></p>
    </div>
</div>

                <h3>Question</h2>
                <p><?php echo $row["question"]; ?></p>

                <h3>Options</h3><br>
          
                  <ol>
                    <li>A  :<?php echo $row["optionA"]; ?></li>
                    <li>B  :<?php echo $row["optionB"]; ?></li>
                    <li>C  :<?php echo $row["optionC"]; ?></li>
                    <li>D  :<?php echo $row["optionD"]; ?></li>
                    <Ul>
                      <li>Correct Option : <?php echo $row["answer"];?></li>
                      </Ul>
                  </ol>
                

                <h3>Solution</h3>
                <p><?php echo $row["solution"]; ?></p>


                <h3>Question Image Path</h3>
                <p><?php echo $row["images"]; ?></p>

                <?php
            }
        ?>
    </div>

</div>
    <!-- code to view questio details ends here -->
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