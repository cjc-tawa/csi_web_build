<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>
<body>

<?php
        if ($_SERVER['REQUEST_METHOD']=="POST"){
             $Username_attempt = $_POST['username'];
             $Password_attempt = $_POST['password'];

          // Checking if the inputs are empty
          if (empty($username_attempt)) {}
          elseif (empty($password_attempt)) {}
          else {
            // Continue with the password validation
            require_once("connectUser.php");

            // Querying the database for the information
            $query = "
                SELECT hash FROM login WHERE username ='". $username_attempt . "'
            ";
            $response = mysqli_query($con, $query);
          /* needs to be set up stolen from Deanglo
          // Checking if the username is valid
          if ($response) {
            $real_password_hash = mysqli_fetch_assoc($response)["password_hash"];

            if ($real_password_hash == $password_attempt_hash) {
                $_SESSION["user_logged_in"] = true;

                // Special case
                if ($username_attempt == "Graeme") {
                    $_SESSION["admin_logged_in"] = true;
                }
                
                header("Location: http://localhost/music_website/index.php");  
            }
          */
        }

        else{
            ?>


<form action="action_page.php" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
  </div>
</form>
        <?php }?>