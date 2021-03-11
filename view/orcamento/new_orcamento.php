<?php
include_once('../models/connect.php');
session_start();
if(!$_SESSION['user']){
    header("Location: ../../view/login.php");
}
getAllCliente()
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ESQUADRITEC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/new_orcamento.css">
</head>

<body>
    <form action="../../models/new_linha.php" method="POST">
        <div class="c-c card formulario">
            <input class="input_1" type="text" name="linha" placeholder="Linha" required>
        </div>
    </form>

    <div class="p-t-m error">
        <?php
            if($_SESSION['sucess']){
                echo "<div class='sucess'>".$_SESSION['sucess']."</div>";
                $_SESSION['sucess'] = '';
            }
            if($_SESSION['error']){
                echo "<div class='error'>".$_SESSION['error']."</div>";
                $_SESSION['error'] = '';
            }
        ?>
    </div>
</body>

</html>