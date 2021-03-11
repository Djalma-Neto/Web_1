<?php
try {
    include_once('../connect.php');
    del_cliente();
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/home.php");
    die();
}
?>