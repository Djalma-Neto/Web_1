<?php
try {
    include_once('../connect.php');
    update_material_produto();
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>