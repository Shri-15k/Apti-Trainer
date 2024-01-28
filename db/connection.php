<?php 

$con=mysqli_connect("localhost","root","","apti_trainer");

if(mysqli_connect_error()){
    echo"<script>alert(can't connect to the database);<script>";
    exit();
}

?>