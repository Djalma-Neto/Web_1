<?php
try {
    include_once('../connect.php');
    update_cliente();
} catch (PDOException $e){
    header("Location: ../../view");
    die();
}
?>