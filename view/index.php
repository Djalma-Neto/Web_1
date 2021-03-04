<?php
    include_once("../models/connect.php");
    $_SESSION['error'] = '';
    $_SESSION['user'] = '';
    $_SESSION['sucess'] = '';
    $_SESSION['materiais'] = '';
    $_SESSION["modelos"] = '';
    $_SESSION['linhas'] = '';
    getAllMaterial();
    getAllModelo();
    getAllLinha();

    header("Location: ./login.php");
?>