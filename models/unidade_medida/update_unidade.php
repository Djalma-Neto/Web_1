<?php
try {
    include_once('../connect.php');
    update_unidade();
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>