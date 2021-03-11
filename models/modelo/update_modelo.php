<?php
try {
    include_once('../connect.php');
    update_modelo();
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/home.php");
    die();
}
?>