<?php
try {
    include_once('../connect.php');
    new_linha();
} catch (PDOException $e){
    header("Location: ../../view");
    die();
}
?>