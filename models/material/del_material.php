<?php
try {
    include_once('../connect.php');
    del_material();
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/home.php");
    die();
}
?>