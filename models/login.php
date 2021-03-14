<?php
try {
    include_once('./connect.php');
    login();
} catch (PDOException $e){
    header("Location: ../view");
    die();
}
?>