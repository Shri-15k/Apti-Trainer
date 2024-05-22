<?php 
    echo "<img src='$path/resources/images/study.png' alt='Logo'>";
?>

<h2>Apti-Trainer</h2>
<nav>
    <!-- <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Aptitude</a>
            <a href="#">Fundamentals</a> -->

    <?php
    if (isset($path)){
        $nav_elements = array("Home/Home", "Topics/categorydash_f","Mock/MockTest", "Notes/Notes", "Discussion/Discussion", "MNC/MNC","Admin/Admin");
        for ($x = 0; $x < count($nav_elements); $x++) {
    
                $temp = explode('/', $nav_elements[$x]);
                $name = $temp[count($temp) - 1];
                echo "<a href='$path/Sections/$nav_elements[$x].php'>$name</a>";
    
        }
    }
    ?>

</nav>

<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    echo "
            <div class='user'>
            $_SESSION[username] : <a href='$path/components/logout.php'>Logout</a>
            <div>
            ";
} else {
    echo "
            <div class='sign-in-up'>
                <button type='button' onclick=\"popup('login-popup')\">Login</button>
                <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
            </div>
            ";
}

?>