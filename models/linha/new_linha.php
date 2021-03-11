<?php
try {
    include_once('../connect.php');
    new_linha();
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/linha/new_linha.php");
    die();
}
?>