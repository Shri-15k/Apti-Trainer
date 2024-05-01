<?php
require('db/connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="resources/CSS/style.css">
    <link rel="stylesheet" href="resources/CSS/index.css">
    <link rel="stylesheet" href="resources/CSS/forgotpass.css">
</head>

<body>
    <header>
        <?php
        $path = ".";
        include("components/nav_header.php");
        ?>
    </header>

    <section class="main">
        <section class="left">
            <p class="title">Apti-Trainer</p>
            <p class="msg">
                "Apti Trainer" is a comprehensive online platform designed
                to empower students in preparing for placement assessments.
                With a focus on honing essential aptitude skills, our
                platform offers a dynamic and interactive learning
                experience.
            </p>
            <button class="cta">
                Learn More...!
            </button>
        </section>
        <section class="right">
            <img src="resources/images/people.png" alt="Landing Image">
        </section>
    </section>

    <section class="main">
        <section class="left2">
            <img src="resources/images/skills.png" alt="Landing Image">
        </section>
        <section class="right2">
            <p class="title">Learn The Skills</p>
            <p class="msg">
                "Tailored specifically for students, our platform offers a diverse range of courses covering academic subjects, practical skills, and personal development
            </p>
        </section>
    </section>

    <section class="main">
        <section class="left">
            <p class="title">Pathway To Career</p>
            <p class="msg">
                This comprehensive program focuses on providing students
                with the essential skills, insights, and resources
                needed to kickstart their careers confidently.
            </p>
        </section>
        <section class="right">
            <img src="resources/images/career.png" alt="Landing Image" style="width: 85%; ">
        </section>
    </section>

    <section class="main">
        <section class="left2">
            <img src="resources/images/boy.png" alt="Landing Image">
        </section>
        <section class="right2">
            <p class="title">Test Yourself</p>
            <p class="msg">
                This project offers a diverse range of quizzes, practice
                tests, and self-assessment tools tailored to help
                students reinforce their understanding and improve
                test-taking skills
            </p>
        </section>
    </section>

    <div class="popup-container" id="login-popup">
        <div class="popup">
            <form method="POST" action="Sections/User/login_register.php">
                <h2>
                    <span>USER LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')">X</button>
                </h2>
                <input type="text" placeholder="Email or Username" name="email_username">
                <input type="password" placeholder="password" name="password">
                <button type="submit" class="login-btn" name="login">LOGIN</button>
            </form>
            <div class="forgot-btn">
                <button type="button" onclick="forgotPopup()">Forgot Password ?</button>
            </div>
        </div>
    </div>


    <div class="popup-container" id="register-popup">
        <div class="register popup">
            <form method="POST" action="Sections/User/login_register.php">
                <h2>
                    <span>USER REGISTER</span>
                    <button type="reset" onclick="popup('register-popup')">X</button>
                </h2>
                <input type="text" placeholder="Full Name" name="fullname">
                <input type="text" placeholder="Username" name="username">
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" placeholder="password" name="password">
                <button type="submit" class="register-btn" name="register">REGISTER</button>
            </form>
        </div>
    </div>

    <!--forgot pop up code -->

    <div class="popup-container" id="forgot-popup">
        <div class="forgot popup">
            <form method="POST" action="Sections/User/forgotpassword.php">
                <h2>
                    <span>RESET PASSWORD</span>
                    <button type="reset" onclick="popup('forgot-popup')">X</button>
                </h2>
                <input type="text" placeholder="Email" name="email">
                <button type="submit" class="reset-btn" name="send-reset-link">SEND LINK</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        echo "<script>window.location.href = 'Sections/Home/Home.php';</script>";
        exit(); // Ensure that script execution stops after redirection
    }


    ?>

    <script>
        function popup(popup_name) {
            get_popup = document.getElementById(popup_name);
            if (get_popup.style.display == "flex") {
                get_popup.style.display = "none";
            } else {
                get_popup.style.display = "flex";
            }
        }

        function forgotPopup() {
            document.getElementById('login-popup').style.display = "none";
            document.getElementById('forgot-popup').style.display = "flex";

        }
    </script>
</body>

</html>