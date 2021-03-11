<?php
try {
    include_once('../connect.php');
    new_material();
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/materiais/new_material.php");
    die();
}
?>