<?php
    // Establishing the connection to the user's database
    require("connectUser.php");

    // Getting the variables from the new_password form
    $new_username = $_POST["new_username"];
    $new_password = $_POST["new_password"];

    // Building the query
    $query = "
        INSERT INTO login (userName, hash)
        VALUES ('" . $new_username . "','" . $new_password . "')
    ";

    // Executing the query
    mysqli_query($con, $query);

    // Going back to the admin page
    header("Location: http://localhost/CSI_WEB_BUILD/admin.php");
?>
    