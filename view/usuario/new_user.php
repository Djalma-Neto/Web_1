<?php
session_start();
if (!$_SESSION['user']) {
    header("Location: ../../view/login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ESQUADRITEC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/new_user.css">
</head>

<body>
    <h1 class="title"> CADASTRAR FUNCIONÁRIO </h1>
    <form action="../../models/usuario/new_user.php" method="POST">
        <div class="c-c card formulario">
            <input class="input_1" type="text" name="nome" placeholder="Nome" required>
            <input class="input_1" type="text" name="email" placeholder="E-mail" required>
            <input class="input_1" type="password" name="senha" placeholder="Senha" required>
            <input class="input_1" type="password" name="confirm" placeholder="Confirmar senha" required>
            <div class="input_1 p-b-l">
                <label for="admin">ADMIN</label>
                <input type="checkbox" name="admin" value="1">
            </div>
            <input type="submit" value="CONFIRMAR">

            <div class="p-t-m error">
                <?php
                if ($_SESSION['error']) {
                    echo $_SESSION['error'];
                    $_SESSION['error'] = '';
                }
                ?>
            </div>
        </div>
    </form>
</body>

</html>