<?php
try {
    include_once('../connect.php');
    del_material();
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>