<?php
  session_start();
  $response = null;
  if ($_SERVER['REQUEST_METHOD']=="POST") {
      $username_attempt = $_POST['username_attempt'];
      $password_attempt = $_POST['password_attempt'];
    
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
    }
    
    // Checking if the username is valid
    if ($response) {
      $real_password = mysqli_fetch_assoc($response)["hash"];

      if ($real_password == $password_attempt) {
        $_SESSION["user_logged_in"] = true;

        // Special case
        if ($username_attempt == "graeme") {
            $_SESSION["admin_logged_in"] = true;
        }

      header("Location: http://localhost/CSI_WEB_BUILD/query1.php");
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>
<body>
<form action="index.php" method="post">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username_attempt" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password_attempt" required>

    <button type="submit">Login</button>
  </div>
</form>
<form action="index.php" method="get">
<?php
    if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['someAction']))
    {
        func();
    }
    function func() {
      session_destroy();     
    }
?>
  <input type="submit" name="someAction" value="Clear Session"/>
</form> 
</body>
</html>