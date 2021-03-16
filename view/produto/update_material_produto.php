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
    <link rel="stylesheet" href="../../css/new_user.css">
</head>

<body>
    <form action="../../models/produto/update_material_produto.php" method="POST">
        <div class="c-c card formulario">
            <?php
                $id = $_POST['id'];
                echo "<input class='input_1' type='hidden' name='id' value='$id'>";
                echo "<input class='input_1' type='number' name='quantidade' placeholder='Quantidade' value='".$_SESSION['material_produto'][$id]['quantidade']."'>";

                echo "<label for='modelos'>Material:</label>
                <select id='material' name='material' value='".$_SESSION['material_produto'][$id]['material']->id."'>";
                for($x = 0; $x < count($_SESSION['materiais']); $x++){
                    echo "<option value=".$_SESSION['materiais'][$x]->id.">".$_SESSION['materiais'][$x]->nome."</option>";
                }
                echo "</select>";
            ?>

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