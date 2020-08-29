<?php
    session_start();
    unset($_SESSION["user_logged_in"]);
    session_destroy();
    header("Location: http://localhost/CSI_WEB_BUILD/index.php");
?>