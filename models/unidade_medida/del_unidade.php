<?php
try {
    include_once('../connect.php');
    del_unidade();
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>