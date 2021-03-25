<?php
include_once('../../models/connect.php');
if(!$_SESSION['user']){
    header("Location: ../../view/");
}
getAllCliente();
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
<H1 class="title">NOVO ORÇAMENTO</H1>
    <form action="../../models/orcamento/new_orcamento.php" method="POST">
        <div class="c-c card formulario">
            <label for="clientes">Cliente:</label>
            <select id="clientes" name="cliente">
                <?php
                    for($x = 0; $x < count($_SESSION['clientes']); $x++){
                        echo "<option value=".$_SESSION['clientes'][$x]->id.">".$_SESSION['clientes'][$x]->nome."</option>";
                    }
                ?>
            </select>

            <input id="desconto" class="input_1" type="number" name="desconto" placeholder="Desconto(%)" required>

            <label for="observacao">Faça uma observação sobre o orçamento aqui...</label>
            <textarea id="observacao" name="observacao" rows="10" cols="40"></textarea>

            <a href="../produto/new_produto.php">ADD Produto</a>

            <div id="buttons">
                <button id="back" onclick="window.history.back()">CANCELAR</button>
                <input type="submit" value="CONFIRMAR">
            </div>
        </div>
    </form>

    <div>
                PRODUTOS
                <?php
                    if (count($_SESSION['produtos']) > 0) {
                        echo
                        "<table>
                            <tr>
                                <th class='nome'>NOME</th>
                                <th class='nome'>MODELO</th>
                                <th class='nome'>LINHA</th>
                                <th class='acao'>AÇÕES</th>
                            </tr>";
                            for($x=0; $x < count($_SESSION['produtos']); $x++){
                                echo
                                "<tr>
                                    <th class='nome'>".$_SESSION['produtos'][$x]['produto']."</th>
                                    <th class='linha'>".$_SESSION['produtos'][$x]['modelo']->modelo."</th>
                                    <th class='modelo'>".$_SESSION['produtos'][$x]['linha']->linha."</th>
                                    <th class='acao'>
                                        <form class='list-component' action='../produto/update_produto.php' method='POST'>
                                            <input type='hidden' name='id' value=".$x.">
                                            <button type='submit' class='option'><img class='icon' src='../../css/img/update.svg'></button>
                                        </form>
                                        <form class='list-component' action='../../models/produto/del_produto.php' method='POST'>
                                            <input type='hidden' name='id' value=".$x.">
                                            <button type='submit' class='option'><img class='icon' src='../../css/img/close.svg'></button>
                                        </form>
                                    </th>
                                </tr>";
                            }
                        echo "</table>";
                    }
                ?>
            </div>

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