<?php
try {
    include_once('../connect.php');
    del_cliente();
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>