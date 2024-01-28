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

        <div class="container">

            <div class="quantitative-wrapper">
                <div class="quantitative">

                    <h1>Quantitative-Topics <span></span></h1>


                    <?php
                    $sql = "SELECT * FROM category WHERE cat_id=1";
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

                    }

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