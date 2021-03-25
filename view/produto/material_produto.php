<?php
session_start();
if(!$_SESSION['user']){
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
    <link rel="stylesheet" href="../../css/produto.css">
</head>

<body>
    <form action="../../models/produto/new_material_produto.php" method="POST">
        <div class="c-c card formulario">
            <label for="material">Material:</label>
            <select class="input_1" id="material" name="material">
                <?php
                    for($x = 0; $x < count($_SESSION['materiais']); $x++){
                        echo "<option value=".$_SESSION['materiais'][$x]->id.">".$_SESSION['materiais'][$x]->nome."</option>";
                    }
                ?>
            </select>

            <select class="input_1" id="unidades" name="unidades">
                <?php
                    for($x = 0; $x < count($_SESSION['unidades']); $x++){
                        echo "<option value=".$_SESSION['unidades'][$x]->id.">".$_SESSION['unidades'][$x]->nome."</option>";
                    }
                ?>
            </select>

            <input class="input_1" type="number" name="quantidade" placeholder="Quantidade" required>

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
</body>

</html>