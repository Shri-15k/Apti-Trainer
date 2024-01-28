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
    <title>Arithmatic</title>
    <link rel="stylesheet" href="../../resources/CSS/style.css">
    <link rel="stylesheet" href="../../resources/CSS/MNC.css">
    <link rel="stylesheet" href="../../resources/CSS/sidenav.css">

</head>

<style>
    .container {
        min-height: 100vh;
        width: 100%;
        background-image: linear-gradient(95.2deg, rgba(173, 252, 234, 1) 26.8%, rgba(192, 229, 246, 1) 64%);
    }

    .quantitative-wrapper {
        padding: 5% 8%;
    }

    .quantitative {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h1 {
        color: #fff;
        font-size: 4rem;
        -webkit-text-stroke-width: 2px;
        -webkit-text-stroke-color: transparent;
        letter-spacing: 4px;
        background-color: rgb(4, 52, 83);
        background: linear-gradient(135deg, rgb(1, 21, 35) 0%, rgb(3, 169, 128) 25%, rgb(49, 2, 57) 50%, #182848 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        position: relative;

    }

    h1:after {
        content: "";
        position: absolute;
        top: 100%;
        left: 10%;
        height: 8px;
        width: 80%;
        border-radius: 8px;
        background-color: rgba(6, 0, 0, 0.05);
    }

    h1 span {
        position: absolute;
        top: 100%;
        left: 10%;
        height: 8px;
        width: 8px;
        border-radius: 50%;
        background-color: #72e2ae;
        animation: anim 5s linear infinite;

    }

    @keyframes anim {
        95% {
            opacity: 0;
        }

        100% {
            opacity: 0;
            left: 88%;
        }
    }

    .cards-container {
        width: 100%;
        max-width: 1000px;
        /* Adjust the maximum width of the cards container */

        height: fit-content;
        /* Automatically adjusts its height based on content */
        margin-top: 35px;
        /* Adjust margin as needed */
        display: flex;
        justify-content: center;
        border-radius: 10px;
        background-color: #a7f8f8;
        padding: 20px;
        /* Padding around the cards */
        box-sizing: border-box;
        /* Ensure padding doesn't affect the width */

        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Add shadow */
        transition: background-color 0.3s, box-shadow 0.3s;
        /* Transition effect */
    }

    .cards-container:hover {
        border: 2px solid #008080;
        /* Border with different color */

        background-color: transparent;
        /* Change color on hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        /* Change shadow on hover */
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
        margin-top: 0;
        /* Adjust top margin */
        align-content: center;
        /* Align the grid content vertically */
        justify-content: center;
        /* Align the grid content horizontally */
    }

    .card {
        height: 160px;
        width: 450px;
        background-image: linear-gradient(to right, #141e30, #243b55);

        padding: 3% 8%;
        border: 0.2px solid rgb(114, 226, 174, 0.2);
        border-radius: 10px;

        display: flex;
        align-items: center;
        flex-direction: column;
        position: relative;
        overflow: hidden;
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }

    .card:after {
        content: "";
        position: absolute;
        top: 150%;
        left: -200px;
        width: 120%;

        transform: rotateY(180deg);
        background-color: #fff;
        height: 18px;
        filter: blur(30px);
        opacity: 0.5;
        transition: 1s;
    }

    .card:hover:after {
        width: 225%;
        top: -100%;


    }

    .card h2 {
        color: #fff;
        text-align: center;
        font-size: 35px;
        font-weight: 600;
        letter-spacing: 1px;

    }


    .card:hover {
        background-image: url('../../resources/images/quantback.jpg');
        /* Replace with your image path */
        background-size: cover;
        /* Adjust as needed */
        background-repeat: no-repeat;
        /* Prevent image repetition */
        transform: translateY(-8px);
        border-color: #00ff37;

    }



    .view-topics-button {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        border: none;
        border-radius: 5px;
        background-color: #008080;
        /* Color for the buttons */
        color: #FFFFFF;
        /* Text color for the buttons */
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .view-topics-button:hover {
        background-color: #6b7d7a;
        /* Hover color for the buttons */
        color: #000000;
        /* Text hover color for the buttons */
    }

    .circle {
        position: absolute;
        border-radius: 50%;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.2);
        /* Linear gradient colors */
        background-image: linear-gradient(to right, #ff6e7f, #bfe9ff);
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.4), inset 0 0 20px rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .circle1 {
        top: 50px;
        left: 50px;
    }

    .circle2 {
        bottom: 50px;
        right: 45px;
    }

    .circle3 {
        top: 870px;
        left: 50px;

    }
</style>

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

                    <h1>Arithmatic-Topics <span></span></h1>

                    <div class="cards-container">
                        <div class="circle circle1"></div>
                        <div class="circle circle2"></div>
                        <div class="circle circle3"></div>

                        <div class="cards">
                            <div class="card">
                                <h2>Problems on Trains</h2>
                                <div class="buttons">
                                    <a href="practice_page.html" class="view-topics-button">Practice</a>
                                    <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                    <a href="notes_page.html" class="view-topics-button">Notes</a>
                                </div>
                            </div>
                            <div class="card">
                                <h2>Time and Distance</h2>
                                <div class="buttons">
                                    <a href="practice_page.html" class="view-topics-button">Practice</a>
                                    <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                    <a href="notes_page.html" class="view-topics-button">Notes</a>
                                </div>
                            </div>
                            <div class="card">
                                <h2>Height and Distance</h2>
                                <div class="buttons">
                                    <a href="practice_page.html" class="view-topics-button">Practice</a>
                                    <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                    <a href="notes_page.html" class="view-topics-button">Notes</a>
                                </div>

                            </div>
                            <div class="card">
                                <h2>Time and Work</h2>
                                <div class="buttons">
                                    <a href="practice_page.html" class="view-topics-button">Practice</a>
                                    <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                    <a href="notes_page.html" class="view-topics-button">Notes</a>
                                </div>

                            </div>
                            <div class="card">
                                <h2>Simple Interest</h2>
                                <div class="buttons">
                                    <a href="practice_page.html" class="view-topics-button">Practice</a>
                                    <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                    <a href="notes_page.html" class="view-topics-button">Notes</a>
                                </div>

                            </div>
                            <div class="card">
                                <h2>Compound Interest</h2>
                                <div class="buttons">
                                    <a href="practice_page.html" class="view-topics-button">Practice</a>
                                    <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                    <a href="notes_page.html" class="view-topics-button">Notes</a>
                                </div>

                            </div>
                            <div class="card">
                                <h2>Profit and Loss</h2>
                                <div class="buttons">
                                    <a href="practice_page.html" class="view-topics-button">Practice</a>
                                    <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                    <a href="notes_page.html" class="view-topics-button">Notes</a>
                                </div>

                            </div>
                            <div class="card">
                                <h2>Partnership</h2>
                                <div class="buttons">
                                    <a href="practice_page.html" class="view-topics-button">Practice</a>
                                    <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                    <a href="notes_page.html" class="view-topics-button">Notes</a>
                                </div>

                            </div>
                            <div class="card">
                                <h2>Percentage</h2>
                                <div class="buttons">
                                    <a href="practice_page.html" class="view-topics-button">Practice</a>
                                    <a href="quiz_page.html" class="view-topics-button">Quiz</a>
                                    <a href="notes_page.html" class="view-topics-button">Notes</a>
                                </div>

                            </div>
                            <div class="card">
                                <h2>Problems on Ages</h2>
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



    <?php } else {
        echo "
        <script>alert('Please LogIn!');
        window.location.href='../../index.php';
        </script>
        ";
    } ?>



</body>

</html>