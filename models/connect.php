<?php
session_start();
$dsn = 'mysql:host=localhost;dbname=esquadritec';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$dataBase = new PDO($dsn, $username, $password, $options);

$_SESSION['usuarios'] = $dataBase->query('SELECT * FROM usuario');
header("Location: ../view/home.php")
?>