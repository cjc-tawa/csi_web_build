<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/CSI_WEB_BUILD/index.php");
?>