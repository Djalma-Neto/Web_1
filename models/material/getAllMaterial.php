<?php
try {
    include_once('../connect.php');
    getAllMaterial();
    header("Location: ../../view/materiais/materiais.php");
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/home.php");
    die();
}
?>