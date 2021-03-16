<?php
session_start();
if(!$_SESSION['user']){
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
    <link rel="stylesheet" href="../../css/produto.css">
</head>

<body>
    <form action="../../models/produto/new_produto.php" method="POST">
        <div class="c-c card formulario">
            <input class="input_1" type="text" name="produto" placeholder="Produto" required>

            <label for="modelos">Modelo:</label>
            <select id="modelos" name="modelo">
                <?php
                    for($x = 0; $x < count($_SESSION['modelos']); $x++){
                        echo "<option value=".$_SESSION['modelos'][$x]->id.">".$_SESSION['modelos'][$x]->modelo."</option>";
                    }
                ?>
            </select>

            <label for="linhas">Linhas:</label>
            <select id="linhas"  name="linha">
                <?php
                    for($x = 0; $x < count($_SESSION['linhas']); $x++){
                        echo "<option value=".$_SESSION['linhas'][$x]->id.">".$_SESSION['linhas'][$x]->linha."</option>";
                    }
                ?>
            </select>

            <a href="./material_produto.php">ADD Material</a>

            <input type="submit" value="CONFIRMAR">

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
        </div>
    </form>
    <div>
                MATERIAIS
                <?php
                    if (count($_SESSION['material_produto']) > 0) {
                        echo
                        "<table>
                            <tr>
                                <th class='nome'>NOME</th>
                                <th class='valor'>VALOR</th>
                                <th class='quantidade'>QUANTIDADE</th>
                                <th class='acao'>AÇÕES</th>
                            </tr>";
                            for($x=0; $x < count($_SESSION['material_produto']); $x++){
                                echo
                                "<tr>
                                    <th class='nome'>".$_SESSION['material_produto'][$x]['material']->nome."</th>
                                    <th class='valor'>".$_SESSION['material_produto'][$x]['material']->valor."</th>
                                    <th class='quantidade'>".$_SESSION['material_produto'][$x]['quantidade']."</th>
                                    <th class='acao'>
                                        <form class='list-component' action='../produto/update_material_produto.php' method='POST'>
                                            <input type='hidden' name='id' value=".$x.">
                                            <button type='submit' class='option'><img class='icon' src='../../css/img/update.svg'></button>
                                        </form>
                                        <form class='list-component' action='../../models/produto/del_material_produto.php' method='POST'>
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
</body>

</html>