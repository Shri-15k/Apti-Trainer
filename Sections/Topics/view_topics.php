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

<body>
    <header>
        <?php $path = "../..";  include("../../components/nav_header.php") ;?>
    </header>

    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        ?>

        <?php
        if (isset($_GET['data'])) {
            $data = $_GET['data']; // Decode and parse the data
            
                $sql = "SELECT cat_name FROM `category` WHERE cat_id = $data";
                $result1 = mysqli_query($con, $sql);
                $row1=mysqli_fetch_array($result1);
        ?>

        <div class="container">

            <div class="category-wrapper">
                <div class="category">

                    <h1><?php echo $row1['cat_name']?><span></span></h1>


                    <?php
                    $sql = "SELECT * FROM topics WHERE cat_id=$data";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>

                        <div class="cards-container">
                            <div class="cards">

                                <div class="card">
                                    <h2 class="card-title">
                                        <?php echo $row['topic_name'] ?>
                                    </h2>
                                    <div class="buttons">
                                        <a href="practice_page.html" class="view-topics-button">Practice</a>
                                        <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                        <a href="notes_page.html" class="view-topics-button">Notes</a>
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
    <?php } else {
        echo "
        <script>alert('Please LogIn!');
        window.location.href='../../index.php';
        </script>
        ";
    } ?>

</body>

</html>