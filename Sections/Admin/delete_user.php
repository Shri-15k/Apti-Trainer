<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    include("../../db/connection.php");

    // Fetch user information
    $sql = "SELECT * FROM registered_users WHERE username='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if user exists
    if ($row) {
        // Display confirmation dialog
        echo "<script>";
        echo "if(confirm('Are you sure you want to delete user: " . $row['full_name'] . "?')) {";
        echo "  window.location.href = 'delete_user.php?confirm=true&id=$id';";
        echo "} else {";
        echo "  window.location.href = 'Admin.php';";
        echo "}";
        echo "</script>";
    } else {
        echo "User not found.";
    }
}

// If confirmed, delete the user
if(isset($_GET['confirm']) && $_GET['confirm'] == 'true'){
    $id = $_GET['id'];
    $sql = "DELETE FROM registered_users WHERE username='$id'";
    if(mysqli_query($con,$sql)){
        session_start();
        $_SESSION["delete"]= "User Deleted Successfully";
        header("Location:Admin.php");
    }else{
        echo "Something Went Wrong";
    }
}
?>
