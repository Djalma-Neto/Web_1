<?php
try {
    include_once('../connect.php');
    getAllCliente();
    header("Location: ../../view/cliente/clientes.php");
} catch (PDOException $e){
    header("Location: ../../view/home.php");
    die();
}
?>