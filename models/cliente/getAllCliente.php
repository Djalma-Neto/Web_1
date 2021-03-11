<?php
try {
    include_once('../connect.php');
    getAllCliente();
    header("Location: ../../view/cliente/clientes.php");
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/home.php");
    die();
}
?>