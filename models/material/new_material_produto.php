<?php
try {
    include_once('../connect.php');
    new_material();
} catch (PDOException $e){
    header("Location: ../../view/materiais/new_material.php");
    die();
}
?>