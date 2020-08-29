<?php
session_start();
if ((isset($_SESSION["user_logged_in"])) and $_SESSION["admin_logged_in"] == true) {
}
else{
        header("Location: http://localhost/CSI_WEB_BUILD/index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("connectUser.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Music Database</title>
</head>
<body>
    <div id="wrapper">
        <nav id="navbar">
        <div id="bold"><h1>Music Database</h1></div>
                <nav id='links'>
                        <ul>
                                <li><a href="query1.php">Albums</a></li>
                                <li><a href="query2.php">Artists</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                                <?php
                                if (isset($_SESSION["admin_logged_in"])) {
                                ?>
                                <li><a href="admin.php">Admin</a></li>
                                <?php
                                }
                                ?>
                        </ul>
                </nav>
        </nav>
        <div id="main">
            <table id="info-table">
                <tr>
                    <th>Users</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
                <?php
                    // Building the query
                    $query = "
                        SELECT userID, userName, hash
                        FROM login
                        WHERE 1
                        ORDER BY userName ASC
                    ";
                    // Fetching the data
                    if ($result = mysqli_query($con, $query)) {
                        // Fetching every row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                <tr>
                    <td>
                        <?php echo $row["userName"] ?>
                    </td>
                    <td>
                        <?php echo $row["hash"];?>
                    </td>
                    <td>
                        <a href="
                            <?php echo "delete_user.php?user_id=" . $row["userID"]; ?>
                        ">delete</a>
                        <a href="
                            <?php echo "new_password.php?user_id=" . $row["userID"]; ?>
                        ">update</a>
                    </td>
                </tr>
                            <?php
                        }
                    }
                ?>
            </table>
            <div id="extra-information">
                <a href="new_user.php">add user</a>
            </div>
        </div>
    </div>
</body>
</html>
