<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["user"] == "admin") {
    setcookie("QUE", "", time() - 3600);
    setcookie("USER", "", time() - 3600);
    session_destroy();
}
header("Location: landing.php");
?>