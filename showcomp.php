<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MNC</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/MNC.css">
    <link rel="stylesheet" href="CSS/sidenav.css">
    <script src="JS/MNC.js"></script>
</head>

<!-- <style>
    #noResultsMessage {
        display: none;
        color: red;
        font-weight: bold;
        margin-top: 10px;
        text-align: center;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        /* Background color for better visibility */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 6;
        /* Adjusted z-index to make it appear above everything */
    }

    #searchInput {
        margin-left: 100px;
        /* Adjust the margin to create space between the toggle button and search bar */
        margin-right: 10px;
        /* Add margin to the right to separate the search bar and toggle button */
        padding: 8px;
        border: 2px solid #000;
        border-radius: 5px;
        font-size: 14px;
        position: absolute;
        top: 100px;
        /* Adjust the top value to position it correctly */
        left: 60px;
        /* Adjust the left value to position it correctly */
        z-index: 2;
        /* Ensure it appears above other elements */
    }
</style> -->

<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleBtn = document.getElementById('toggleBtn');
        const sideNav = document.querySelector('.sidenav');
        const searchInput = document.getElementById('searchInput');
        const cards = document.querySelectorAll('.card');
        const noResultsMessage = document.getElementById('noResultsMessage');

        toggleBtn.addEventListener('click', function () {
            sideNav.classList.toggle('open');
        });

        // Add an event listener for the input field
        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.trim().toLowerCase();
            let matchFound = false; // Flag to check if any match is found

            // Loop through all cards and hide/show based on the search term
            cards.forEach(function (card) {
                const cardName = card.id.toLowerCase();
                const cardContent = card.textContent.toLowerCase();

                if (cardName.includes(searchTerm) || cardContent.includes(searchTerm)) {
                    card.style.display = 'flex'; // Show the card
                    matchFound = true;
                } else {
                    card.style.display = 'none'; // Hide the card
                }
            });

            // Show/hide the "no results" message
            noResultsMessage.style.display = matchFound ? 'none' : 'block';
        });

        // Add click event listeners to scroll to the clicked card
        cards.forEach(function (card) {
            card.addEventListener('click', function () {
                // Scroll to the clicked card
                window.location.hash = '#' + card.id;
            });
        });
    });

</script> -->


<body>
    <header>
        <?php include("nav_header.php") ?>
    </header>

    <div id="overlay"></div>
    <div style="display:flex;margin:10px;">
        <button id="toggleBtn">&#9776;</button>

        <input type="text" id="searchInput" placeholder="Search for a company...">
    </div>
    <div id="noResultsMessage">No matching company found!</div>

    <main>
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            ?>



            <nav class="sidenav">
                <ul>
                    <li class="dropdown"><a href="#">Product<span>&rsaquo;</span></a>
                        <ul>
                            <?php

                            $service = "SELECT `comp_name` FROM `mnc_info` WHERE comp_category='Product'";
                            $result = mysqli_query($con, $service);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <li><a href="#<?php echo $row['comp_name'] ?>">
                                        <?php echo $row['comp_name'] ?>
                                    </a></li>

                                <?php

                            }

                            ?>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#">Service<span>&rsaquo;</span></a>

                        <ul>
                            <?php

                            $service = "SELECT `comp_name` FROM `mnc_info` WHERE comp_category='Service'";
                            $result = mysqli_query($con, $service);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <li><a href="#<?php echo $row['comp_name'] ?>">
                                        <?php echo $row['comp_name'] ?>
                                    </a></li>

                                <?php

                            }

                            ?>
                        </ul>
                    </li>


                    <li class="dropdown"><a href="#">Startup<span>&rsaquo;</span></a>

                        <ul>
                            <?php

                            $service = "SELECT `comp_name` FROM `mnc_info` WHERE comp_category='Startup'";
                            $result = mysqli_query($con, $service);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <li><a href="#<?php echo $row['comp_name'] ?>">
                                        <?php echo $row['comp_name'] ?>
                                    </a></li>

                                <?php

                            }

                            ?>
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#">Datacenter<span>&rsaquo;</span></a>

                        <ul>
                            <?php

                            $service = "SELECT `comp_name` FROM `mnc_info` WHERE comp_category='Datacenter'";
                            $result = mysqli_query($con, $service);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <li><a href="#<?php echo $row['comp_name'] ?>">
                                        <?php echo $row['comp_name'] ?>
                                    </a></li>

                                <?php

                            }

                            ?>
                        </ul>
                    </li>


                    <li class="dropdown"><a href="#">Research & Innovation<span>&rsaquo;</span></a>

                        <ul>
                            <?php

                            $service = "SELECT `comp_name` FROM `mnc_info` WHERE comp_category='Research'";
                            $result = mysqli_query($con, $service);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <li><a href="#<?php echo $row['comp_name'] ?>">
                                        <?php echo $row['comp_name'] ?>
                                    </a></li>

                                <?php

                            }

                            ?>
                        </ul>
                    </li>



                </ul>
            </nav>

            <?php

            // Check if a specific category is selected
            if (isset($_GET['category'])) {
                $selectedCategory = $_GET['category'];

                // Check if the selected category is "showall"
                if ($selectedCategory == 'showall') {
                    $sql = "SELECT * FROM mnc_info";
                    $pageTitle = "All Companies";
                } else {
                    $sql = "SELECT * FROM mnc_info WHERE comp_category = '$selectedCategory'";
                    $pageTitle = ucfirst($selectedCategory) . " Companies";
                }
            } else {
                // If no specific category is selected, show all companies
                $sql = "SELECT * FROM mnc_info";
                $pageTitle = "All Companies";
            }

            $result = mysqli_query($con, $sql);
            ?>

            <div class="card-body">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="card" id="<?php echo $row['comp_name'] ?>">
                        <div class="img-container">
                            <img src="<?php echo $row['comp_img'] ?>" alt="<?php echo $row['comp_name'] ?>">
                        </div>
                        <div class="card-content">
                            <h1>
                                <?php echo $row['comp_name'] ?>
                            </h1>
                            <div class="description">
                                <?php echo $row['comp_description'] ?>
                            </div>
                            <div class="description">
                                <?php echo $row['comp_apti'] ?>
                            </div>
                            <div class="link">
                                If you would like to know more about <em><strong>
                                        <?php echo $row['comp_name']; ?>
                                    </strong></em>: <a href="<?php echo $row['comp_website']; ?>" target="_blank"
                                    class="button">Click Here</a>
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
        window.location.href='index.php';
        </script>
        ";
        } ?>
    </main>
</body>

</html>