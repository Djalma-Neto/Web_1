<?php
try {
    include_once('../connect.php');
    del_material_produto();
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>