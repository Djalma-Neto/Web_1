<?php
try {
    include_once('../connect.php');
    update_material();
} catch (PDOException $e){
    header("Location: ../../view");
    die();
}
?>