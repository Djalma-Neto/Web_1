<?php
try {
    include_once('../connect.php');
    getAllUnidade();
    header("Location: ../../view/unidade_medida/unidades.php");
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>