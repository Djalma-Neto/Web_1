<?php
try {
    include_once('../connect.php');
    del_linha();
} catch (PDOException $e){
    header("Location: ../../view");
    die();
}
?>