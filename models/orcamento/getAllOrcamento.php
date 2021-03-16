<?php
try {
    include_once('../connect.php');
    getAllOrcamento();
    header("Location: ../../view/modelo/modelos.php");
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>