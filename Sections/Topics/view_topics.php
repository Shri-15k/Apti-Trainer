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
    <link rel="stylesheet" href="../../resources/CSS/style_quant_topics.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<header>
        <?php $path = "../..";  include("../../components/nav_header.php") ;?>
    </header>

<body style="background-color:#f0f1ee;">


    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        ?>

        <?php
        if (isset($_GET['data'])) {
            $data = $_GET['data']; // Decode and parse the data
            
                $sql = "SELECT cat_name FROM `category` WHERE cat_id = ?";
                $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "s", $data);
                mysqli_stmt_execute($stmt);
                $result1 = mysqli_stmt_get_result($stmt);
                $row1=mysqli_fetch_array($result1);
                $_SESSION['CatId'] = $data;
        ?>

        <div class="container">

            <div class="category-wrapper">
                <div class="category">

                    <h1><?php echo $row1['cat_name']?><span></span></h1>

                    <div>
                    <?php
                    $sql = "SELECT * FROM topics WHERE cat_id=?";
                    $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $data);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row=mysqli_fetch_array($result);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>

                        <div class="cards-container">
                            <div class="cards">

                                <div class="card">
                                    <h2 class="card-title">
                                        <?php echo $row['topic_name'] ?>
                                    </h2>
                                    <div class="buttons">
                                    <a href="practice-test.php?topic=<?php echo $row['topic_name'] ?>" class="view-topics-button">Practice</a>
                                        <a href="quiz.php?topic=<?php echo $row['topic_name'] ?>" class="view-topics-button">Quiz</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                    }//closed while loop

                } else {
                    echo 'No data found in URL parameters.';
                }
                ?>

                    ?>
                    </div>
        </div>
    <?php } else {
        echo "
        <script>alert('Please LogIn!');
        window.location.href='../../index.php';
        </script>
        ";
    } ?>

</body>

</html>