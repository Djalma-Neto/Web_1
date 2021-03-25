<?php
session_start();
if (!$_SESSION['user']) {
    header("Location: ../../view/");
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
    <form action="../../models/cliente/update_cliente.php" method="POST">
        <div class="c-c card formulario">
            <?php
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $cnpj = $_POST["cnpj"] ? $_POST["cnpj"] : '';
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];
            $rua = $_POST["rua"];
            $bairro = $_POST["bairro"];
            $numero = $_POST["numero"];
            $observacao = $_POST["observacao"];
            $id = $_POST['id'];
            $endereco = $_POST['endereco'];

            echo "
                <input class='input_1' type='hidden' name='id' value='$id'>
                <input class='input_1' type='hidden' name='endereco' value='$endereco'>

                NOME<input class='input_1' type='text' name='nome' value='$nome' required>
                CPF<input class='input_1' type='text' name='cpf' value='$cpf' required>
                CNPJ<input class='input_1' type='text' name='cnpj' value='$cnpj'>
                EMAIL<input class='input_1' type='text' name='email' value='$email' required>

                <div class='division'>ENDEREÇO</div>

                CIDADE<input class='input_1' type='text' name='cidade' value='$cidade' required>
                RUA<input class='input_1' type='text' name='rua' value='$rua' required>
                BAIRRO<input class='input_1' type='text' name='bairro' value='$bairro' required>
                NUMERO<input class='input_1' type='text' name='numero' value='$numero' required>
                OBSERVAÇÃO<input class='input_1' type='text' name='observacao' value='$observacao'>";
            ?>


            <div id="buttons">
                <button id="back" onclick="window.history.back()" type="submit" value="CONFIRMAR">CANCELAR</button>
                <input type="submit" value="CONFIRMAR">
            </div>
        </div>
    </form>
</body>

</html>