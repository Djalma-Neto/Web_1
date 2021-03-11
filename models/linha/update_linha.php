<?php
try {
    include_once('../connect.php');
    update_linha();
} catch (PDOException $e){
    header("Location: ../../view");
    die();
}
?>