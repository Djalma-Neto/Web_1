<?php
try {
    include_once('../connect.php');
    del_modelo();
} catch (PDOException $e){
    header("Location: ../../view");
    die();
}
?>