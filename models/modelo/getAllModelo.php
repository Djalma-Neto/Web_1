<?php
try {
    include_once('../connect.php');
    getAllModelo();
    header("Location: ../../view/modelo/modelos.php");
} catch (PDOException $e){
    header("Location: ../../view");
    die();
}
?>