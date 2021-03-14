<?php
try {
    include_once('../connect.php');
    new_modelo();
} catch (PDOException $e){
    header("Location: ../../view/modelo/new_modelo.php");
    die();
}
?>