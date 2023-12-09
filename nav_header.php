<img src="images/study.png" alt="Logo">
        <h2>Apti-Trainer</h2>
        <nav>
            <!-- <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Aptitude</a>
            <a href="#">Fundamentals</a> -->

            <?php 
            $nav_elements = array("Home", "categorydash_f", "Aptitude", "Fundamentals", "MNC");
             for($x = 0; $x<count($nav_elements) ; $x++){
                echo "<a href=\"./$nav_elements[$x].php\">$nav_elements[$x]</a>";
             }
             ?>
            

        </nav>

        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
        {
            echo"
            <div class='user'>
            $_SESSION[username] : <a href='logout.php'>Logout</a>
            <div>
            ";
        }
        else
        {
            echo"
            <div class='sign-in-up'>
                <button type='button' onclick=\"popup('login-popup')\">Login</button>
                <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
            </div>
            ";
        }

        ?> 