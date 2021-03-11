<?php
try {
    include_once('../connect.php');
    getAllModelo();
    header("Location: ../../view/modelo/modelos.php");
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/home.php");
    die();
}
?>