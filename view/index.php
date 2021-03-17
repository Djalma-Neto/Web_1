<?php
    include_once("../models/connect.php");
    $_SESSION['error'] = array();
    $_SESSION['user'] = array();
    $_SESSION['sucess'] = array();
    $_SESSION['materiais'] = array();
    $_SESSION['material_produto'] = array();
    $_SESSION["modelos"] = array();
    $_SESSION['linhas'] = array();
    $_SESSION["clientes"] = array();
    $_SESSION["unidades"] = array();
    $_SESSION['produtos'] = array();
    $_SESSION["orcamentos"] = array();
    getAllMaterial();
    getAllModelo();
    getAllUnidade();
    getAllLinha();
    getAllCliente();
    getAllOrcamento();

    header("Location: ./login.php");
?>