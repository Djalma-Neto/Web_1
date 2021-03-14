<?php
try {
    include_once('../connect.php');
    getAllLinha();
    header("Location: ../../view/linha/linhas.php");
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>