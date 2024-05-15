<?php
include('../../db/connection.php');

if(isset($_POST["edit_comp"])){
    $comp_name= mysqli_real_escape_string($con, $_POST["comp_name"]);
    $comp_img= mysqli_real_escape_string($con, $_POST["comp_img"]);
    $comp_description= mysqli_real_escape_string($con, $_POST["comp_description"]);
    $comp_apti= mysqli_real_escape_string($con, $_POST["comp_apti"]);
    $comp_website= mysqli_real_escape_string($con, $_POST["comp_website"]);
    $comp_category= mysqli_real_escape_string($con, $_POST["comp_category"]);
    //$id= mysqli_real_escape_string($con, $_POST["comp_id"]);
    $id = mysqli_real_escape_string($con, $_GET['id']);
    
    $sql="UPDATE mnc_info SET comp_name='$comp_name', comp_img='$comp_img', comp_description='$comp_description', comp_apti='$comp_apti',comp_website='$comp_website',comp_category='$comp_category' WHERE comp_id='$id'";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Record updated successfully!');</script>";
        echo "<script>window.location.href='Admin.php';</script>";
    }else{
        echo "<script>alert('Details not updated.');</script>";
        echo "<script>window.location.href='Admin.php';</script>";
    }
}
?>
