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

</head>

<body>
    <header>
        <?php include("nav_header.php") ?>
    </header>
    <?php 
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
        {    
    ?>
    <div class="card-body">
        <?php
        // Define a class representing your objects
        // class Candidate
        // {
        //     public echo $path;
        //     public echo $name;
        //     public echo $company_info;
        //     public echo $apti_pattern;
        
        //     // Constructor to initialize properties
        //     public function __construct(echo $path, echo $name, echo $company_info, echo $apti_pattern)
        //     {
        //         echo $this->path = echo $path;
        //         echo $this->name = echo $name;
        //         echo $this->company_info = echo $company_info;
        //         echo $this->apti_pattern = echo $apti_pattern;
        //     }
        // }
        
        // // Create an array of objects
        // echo $candidates = array();
        
        // // Create objects and add them to the array
        // // echo $candidate1 = ;
        // echo $candidate2 = new Candidate('images/study.png', 'Jane Doe', 'Company B', 'Pattern Y');
        // echo $candidate3 = new Candidate('images/study.png', 'Bob Smith', 'Company C', 'Pattern Z');
        
        // echo $candidates[] = new Candidate('images/study.png', 'John Doe', 'Company A', 'Pattern X');
        // echo $candidates[] = echo $candidate2;
        // echo $candidates[] = echo $candidate3;
        
        // Access the array of objects
        $sql = "SELECT * FROM mnc_info";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="card" id="<?php $row['comp_img'] ?>">
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
                        If you would like to know more about <em><strong><?php echo $row['comp_name']; ?></strong></em>: <a href="<?php echo $row['comp_website']; ?>" target="_blank" class="button">Click Here</a>
                    </div>
                </div>
            </div>
            <?php

        }

        ?>
    </div>
    <?php }else{
        echo "
        <script>alert('Please LogIn!');
        window.location.href='index.php';
        </script>
        ";
    } ?>




</body>

</html>
