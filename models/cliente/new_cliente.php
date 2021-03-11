<?php
try {
    include_once('../connect.php');
    new_cliente();
} catch (PDOException $e){
    header("Location: ../../view");
    die();
}
?>