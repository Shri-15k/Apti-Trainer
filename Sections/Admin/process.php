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



//code to insert new compony details

if(isset($_POST["create_comp"])){
    $comp_name= mysqli_real_escape_string($con, $_POST["comp_name"]);
    $comp_img= mysqli_real_escape_string($con, $_POST["comp_img"]);
    $comp_description= mysqli_real_escape_string($con, $_POST["comp_description"]);
    $comp_apti= mysqli_real_escape_string($con, $_POST["comp_apti"]);
    $comp_website= mysqli_real_escape_string($con, $_POST["comp_website"]);
    $comp_category= mysqli_real_escape_string($con, $_POST["comp_category"]);
    //$id= mysqli_real_escape_string($con, $_POST["comp_id"]);
    //$id = mysqli_real_escape_string($con, $_GET['id']);
    $sql="INSERT INTO `mnc_info`(`comp_name`, `comp_img`, `comp_description`, `comp_apti`, `comp_website`, `comp_category`) VALUES ('$comp_name','$comp_img','$comp_description','$comp_apti','$comp_website','$comp_category')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('MNC DEetails Added successfully!');</script>";
        echo "<script>window.location.href='Admin.php';</script>";
    }else{
        echo "<script>alert('Something Went Wrong !');</script>";
        echo "<script>window.location.href='Admin.php';</script>";
    }
}


//code to insert new question into the database 

if(isset($_POST["create_quiz"])){
    $topic_category= mysqli_real_escape_string($con, $_POST["topic_category"]);
    $topic= mysqli_real_escape_string($con, $_POST["topic"]);
    $level= mysqli_real_escape_string($con, $_POST["level"]);
    $question= mysqli_real_escape_string($con, $_POST["question"]);
    $optionA= mysqli_real_escape_string($con, $_POST["optionA"]);
    $optionB= mysqli_real_escape_string($con, $_POST["optionB"]);
    $optionC= mysqli_real_escape_string($con, $_POST["optionC"]);
    $optionD= mysqli_real_escape_string($con, $_POST["optionD"]);
    $answer= mysqli_real_escape_string($con, $_POST["answer"]);
    $solution= mysqli_real_escape_string($con, $_POST["solution"]);
    $images= mysqli_real_escape_string($con, $_POST["images"]);
    //$id= mysqli_real_escape_string($con, $_POST["comp_id"]);
    //$id = mysqli_real_escape_string($con, $_GET['id']);
    $sql="INSERT INTO `quiz`(`category`, `topic`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `answer`, `solution`, `level`, `images`) VALUES ('$topic_category','$topic','$question','$optionA','$optionB','$optionC','$optionD','$answer','$solution','$level','$images')";

    if(mysqli_query($con, $sql)){
        echo "<script>alert('Question Added successfully!');</script>";
        echo "<script>window.location.href='manage_quiz.php';</script>";
    }else{
        echo "<script>alert('Something Went Wrong !');</script>";
        echo "<script>window.location.href='manage_quiz.php';</script>";
    }
}


?>
