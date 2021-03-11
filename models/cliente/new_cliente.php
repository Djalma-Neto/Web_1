<?php
try {
    include_once('../connect.php');
    new_cliente();
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/cliente/new_cliente.php");
    die();
}
?>