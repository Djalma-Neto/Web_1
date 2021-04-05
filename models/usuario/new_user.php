<?php
try {
    include_once('../connect.php');
    new_user();
    $_SESSION['sucess'] = 'Cadastrado!';
} catch (PDOException $e){
    $_SESSION['error'] = $e->getMessage();
    header("Location: ../../view/usuario/new_user.php");
    die();
}
?>