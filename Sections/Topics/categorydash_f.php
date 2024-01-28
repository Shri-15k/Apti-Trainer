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
    <title>Topics Dashboard</title>
    <link rel="stylesheet" href="../../resources/CSS/stylecatdash.css">
    <link rel="stylesheet" href="../../resources/CSS/style.css">


</head>

<body>
    <header>
        <?php 
            $path = "../..";
            include("../../components/nav_header.php"); 
        ?>
    </header>
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        ?>

        <div class="container">
            <div class="category-wrapper">
                <div class="category">
                    <h1>Categories <span></span></h1>
                    <div class="cards">
                        <div class="card">
                            <i class="fas fa-chart-bar"></i>
                            <h2>Quantitative</h2>
                            <p>"Master the numbers and calculations."</p>
                            <button class="view-topics-button" onclick="location.href='arithmatic_topics.php'">View
                                Topics</button>
                        </div>
                        <div class="card">
                            <i class="fas fa-brain"></i>
                            <h2>Logical</h2>
                            <p>"Sharpen your logical reasoning skills."</p>
                            <button class="view-topics-button" onclick="location.href='quantitative_topics.html'">View
                                Topics</button>
                        </div>
                        <div class="card">
                            <i class="fas fa-book"></i>
                            <h2>Verbal</h2>
                            <p>"Enhance your language and grammar skills."</p>
                            <button class="view-topics-button" onclick="location.href='quantitative_topics.html'">View
                                Topics</button>
                        </div>
                        <div class="card">
                            <i class="fas fa-puzzle-piece"></i>
                            <h2>Non-Verbal</h2>
                            <p>"Develop visual problem-solving abilities."</p>
                            <button class="view-topics-button" onclick="location.href='quantitative_topics.html'">View
                                Topics</button>
                        </div>
                        <div class="card">
                            <i class="fas fa-lightbulb"></i>
                            <h2>Reasoning</h2>
                            <p>"Practice critical thinking and analysis."</p>
                            <button class="view-topics-button" onclick="location.href='quantitative_topics.html'">View
                                Topics</button>
                        </div>
                        <div class="card">
                            <i class="fas fa-table"></i>
                            <h2>Data Interpretation</h2>
                            <p>"Learn to interpret and analyze data sets."</p>
                            <button class="view-topics-button" onclick="location.href='quantitative_topics.html'">View
                                Topics</button>
                        </div>
                    </div>
                </div>
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