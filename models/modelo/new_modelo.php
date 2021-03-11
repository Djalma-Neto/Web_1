<?php
try {
    include_once('../connect.php');
    new_modelo();
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/modelo/new_modelo.php");
    die();
}
?>