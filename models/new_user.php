<?php
try {
    include_once('./connect.php');
    new_user();
} catch (PDOException $e){
    header("Location: ../view/login.php");
    die();
}
?>