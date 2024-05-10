<?php
// Include the database connection file
require('../../db/connection.php');

// Calculate the timestamp for 6 hours ago
$sixHoursAgo = strtotime('-6 hours');

// SQL query to delete comments added before 6 hours ago
$query = "DELETE FROM discussion WHERE date < FROM_UNIXTIME($sixHoursAgo)";
if(mysqli_query($conn, $query)) {
    echo "Old comments deleted successfully.";
} else {
    echo "Error deleting old comments: " . mysqli_error($conn);
}
?>
