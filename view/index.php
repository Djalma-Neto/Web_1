<?php
    session_start();
    $_SESSION['error_login'] = '';
    $_SESSION['user'] = '';
    $_SESSION["error_newUser"] = '';

    header("Location: ./login.php");
?>