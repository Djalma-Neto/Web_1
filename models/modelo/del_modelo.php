<?php
try {
    include_once('../connect.php');
    del_modelo();
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/home.php");
    die();
}
?>