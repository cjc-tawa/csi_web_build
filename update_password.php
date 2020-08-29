<?php
    // Establishing the connection to the user's database
    require("connectUser.php");

    // Getting the variables from the new_password form
    $user_id = $_GET["user_id"];
    $new_password = $_POST["new_password"];

    // Building the query
    $query = "
        UPDATE login
        SET hash = '" . $new_password . "'
        WHERE userID = " . $user_id . "
    ";

    // Executing the query
    mysqli_query($con, $query);

    // Going back to the admin page
    header("Location: http://localhost/CSI_WEB_BUILD/admin.php");
?>