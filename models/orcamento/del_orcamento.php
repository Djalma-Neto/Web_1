<?php
try {
    include_once('../connect.php');
    del_orcamento();
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>