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
    <title>MNC</title>
    <link rel="stylesheet" href="../../resources/CSS/style.css">
    <link rel="stylesheet" href="../../resources/CSS/MNC.css">
    <link rel="stylesheet" href="../../resources/CSS/sidenav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../../resources/JS/MNC.js"></script>

</head>

<style>
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .header-section h1 {
        display: flex;
        justify-content: center;
        align-items: center;
        align-self: center;
        width: 100%;
    }


    .tag-section {
        display: flex;
        align-items: center;
    }

    .tag-section img {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }

    .category-text {
        font-weight: bold;
    }
</style>

<body>
    <header id="header">
        <?php 
            $path = "../..";
            include("../../components/nav_header.php") ;
        ?>
    </header>

    <div id="overlay"></div>
    <div style="display:flex;margin:10px;">
        <button id="toggleBtn">&#9776;</button>

        <input type="text" id="searchInput" placeholder="Search for a company...">

        <div class="container">
            <a href="showcomp.php?category=showall" class="category-btn" id="showall">Show All</a>
            <a href="showcomp.php?category=product" class="category-btn" id="product">Product</a>
            <a href="showcomp.php?category=service" class="category-btn" id="service">Service</a>
            <a href="showcomp.php?category=startup" class="category-btn" id="startup">Startup</a>
            <a href="showcomp.php?category=datacenter" class="category-btn" id="datacenter">Datacenter</a>
            <a href="showcomp.php?category=research" class="category-btn" id="research">Research</a>
        </div>
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

            <div class="card-body">
                <?php

                $sql = "SELECT * FROM mnc_info";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="card" id="<?php echo $row['comp_name'] ?>"
                        data-category="<?php echo strtolower($row['comp_category']); ?>">
                        <div class="img-container">
                            <img src="../../resources/<?php echo $row['comp_img'] ?>" alt="<?php echo $row['comp_name'] ?>">
                        </div>
                        <div class="card-content">
                            <div class="header-section">
                                <h1>
                                    <?php echo $row['comp_name'] ?>
                                </h1>
                                <div class="tag-section">
                                    <img src="../../resources/images/tag.png" alt="Tag Icon">
                                    <!-- Replace 'path/to/tag-icon.png' with the actual path to your tag icon -->
                                    <span class="category-text">
                                        <?php echo $row['comp_category']; ?>
                                    </span>
                                </div>
                            </div>
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
                window.location.href='../../index.php';
                </script>
                ";
        } ?>
    </main>

</body>

</html>