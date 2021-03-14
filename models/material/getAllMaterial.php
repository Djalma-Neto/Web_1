<?php
try {
    include_once('../connect.php');
    getAllMaterial();
    header("Location: ../../view/materiais/materiais.php");
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>