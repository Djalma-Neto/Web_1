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
    <form action="../../models/cliente/new_cliente.php" method="POST">
        <div class="c-c card formulario">
            <input class="input_1" type="text" name="nome" placeholder="Nome" required>
            <input class="input_1" type="text" name="cpf" placeholder="CPF" required>
            <input class="input_1" type="text" name="cnpj" placeholder="CNPJ">
            <input class="input_1" type="text" name="email" placeholder="E-mail" required>

            <div>ENDEREÇO</div>

            <input class="input_1" type="text" name="cidade" placeholder="Cidade" required>
            <input class="input_1" type="text" name="rua" placeholder="Rua" required>
            <input class="input_1" type="text" name="bairro" placeholder="Bairro" required>
            <input class="input_1" type="text" name="numero" placeholder="Nº" required>
            <input class="input_1" type="text" name="observacao" placeholder="Observação..." required>

            <div id="buttons">
                <button id="back" type="submit" value="CONFIRMAR">CANCELAR</button>
                <input type="submit" value="CONFIRMAR">
            </div>
            <div class="p-t-m error">
                <?php
                if ($_SESSION['sucess']) {
                    echo "<div class='sucess'>" . $_SESSION['sucess'] . "</div>";
                    $_SESSION['sucess'] = '';
                }
                if ($_SESSION['error']) {
                    echo "<div class='error'>" . $_SESSION['error'] . "</div>";
                    $_SESSION['error'] = '';
                }
                ?>
            </div>
        </div>
    </form>
</body>

</html>