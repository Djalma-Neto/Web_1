<?php
try {
    include_once('../connect.php');
    update_orcamento();
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>