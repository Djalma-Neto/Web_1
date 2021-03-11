<?php
try {
    include_once('../connect.php');
    new_user();
} catch (PDOException $e){
    header("Location: https://esquadritec.herokuapp.com/view/new_user.php");
    die();
}
?>