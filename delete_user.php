<?php
    // Establishing the $connection variable
    session_start();
    require("connectUser.php");
    // Getting the GET variables
    $user_id = $_GET["user_id"];

    // Deleting the user
    $delete_query = "DELETE FROM login WHERE userID = '". $user_id . "'";
    mysqli_query($con, $delete_query);

    // Routing the user back to the admin page
    header("Location: http://localhost/CSI_WEB_BUILD/admin.php");
?>
