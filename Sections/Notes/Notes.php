<?php
require ('../../db/connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="../../resources/CSS/style.css">
    <link rel="stylesheet" href="../../resources/CSS/sidenav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../resources/CSS/Notes.css">
    <script src="../../resources/JS/Notes.js" defer></script>
</head>

<body>
    <header>
        <?php
        $path = '../..';
        include ("$path/components/nav_header.php");
        ?>
    </header>

    <main>
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            ?>
            <?php 
            $qry = "SELECT * FROM `category`;";
            $reslt = mysqli_query($con, $qry);
            while ($row_ = mysqli_fetch_assoc($reslt)) {
            ?>
                <div class="card-body">
                    <div class="item">
                        <div class="card" id="<?php //echo $row['comp_name'] ?>" data-category="<?php //echo strtolower($row['comp_category']); ?>">
                            <div class="img-container">
                                <img src="../../resources/images/Category/<?php echo $row_['cat_name'] ?>.png <?php //echo $row['comp_img'] ?>" alt="<?php //echo $row['comp_name'] ?>">
                            </div>
                            <div class="card-content">
                                <div class="header-section">
                                    <h1>
                                        <?php echo $row_['cat_name']
                                            ?>
                                        
                                    </h1>
                                </div>
                                <img class ="plus-icon" src="../../resources/images/plus.png" alt="plus">
                            </div>
                        </div>
                        <div class="content">
                            <?php 
                            $sql = "SELECT * FROM `notes` WHERE cat_id = " . $row_['cat_id'] . ";";
                                $result = mysqli_query($con, $sql);
                                if(mysqli_num_rows($result) > 0) {
                            ?>

                            <table>
                                <tr>
                                    <th>Topic Name</th>
                                    <th>View Notes</th>
                                    <th>Download Notes</th>
                                    <th>Problem Solving</th>
                                    <th>Company</th>
                                </tr>
                                <!-- // TODO: following tr will go into the loop -->
                                <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['notes_name'] ?></td>
                                    
                                    <td><a href='DetailNote.php?data=<?php echo $row['notes_name'] ?>'><img src="../../resources/images/short-note.png" alt="view"></a></td>
                                    <td><a href = 'downloads/<?php echo $row['download_notes'] ?>' target="_blank"> <img src="../../resources/images/download.png" alt="download"></a></td>
                                    <td><a href = '<?php echo $row['youtube_link'] ?>' target="_blank"><img src="../../resources/images/youtube.png" alt="problems"></a></td>
                                    <td><a href='CompTags.php?data=<?php echo $row['notes_name'] ?>'><img src="../../resources/images/tag.png" alt="company tags"></td>
                                </tr>
                                <?php
                                        }
                                ?>
                            </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>

        <?php 
                                    }
    } else {
            echo "
            <script>alert('Please LogIn!');
            window.location.href='../../index.php';
            </scrip>
            ";
        }
        ?>
    </main>
</body>

</html>