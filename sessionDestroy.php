<?php
if (isset($_SESSION["user_logged_in"])){
    session_destroy();
}
?>