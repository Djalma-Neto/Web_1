<?php
    include_once("../models/connect.php");
    $_SESSION['error'] = '';
    $_SESSION['user'] = '';
    $_SESSION['sucess'] = '';
    $_SESSION['materiais'] = '';
    $_SESSION["modelos"] = '';
    $_SESSION['linhas'] = '';
    $_SESSION["clientes"] = '';
    getAllMaterial();
    getAllModelo();
    getAllLinha();
    getAllCliente();

    header("Location: view/login.php");
?>