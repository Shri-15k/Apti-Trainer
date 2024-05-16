<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("../../db/connection.php");

    // Fetch user information
    $sql = "SELECT * FROM quiz WHERE tag='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if user exists
    if ($row) {
        // Display confirmation dialog
        echo "<script>";
        echo "if(confirm('Are you sure you want to delete question: " . $row['tag'] . "?')) {";
        echo "  window.location.href = 'delete_quiz.php?confirm=true&id=$id';";
        echo "} else {";
        echo "  window.location.href = 'manage_quiz.php';";
        echo "}";
        echo "</script>";
    } else {
        echo "Question ID not found";
    }
}

// If confirmed, delete the user
if(isset($_GET['confirm']) && $_GET['confirm'] == 'true'){
    $id = $_GET['id'];
    $sql = "DELETE FROM quiz WHERE tag='$id'";
    if(mysqli_query($con,$sql)){
        session_start();
        $_SESSION["delete"]= "Question Deleted Successfully";
        header("Location:manage_quiz.php");
    }else{
        echo "Something Went Wrong";
    }
}
?>
