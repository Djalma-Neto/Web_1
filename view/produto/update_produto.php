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
    <link rel="stylesheet" href="../../css/new_user.css">
</head>

<body>
    <form action="../../models/produto/update_produto.php" method="POST">
        <div class="c-c card formulario">
            <?php
                $id = $_POST['id'];
                echo "<input class='input_1' type='hidden' name='id' value='$id'>";
                echo "<input class='input_1' type='text' name='nome' value=".$_SESSION['produtos'][$id]['produto'].">";

                echo "<label for='modelos'>Modelo:</label>
                <select id='modelos' name='modelo' value='".$_SESSION['produtos'][$id]['modelo']->id."'>";
                for($x = 0; $x < count($_SESSION['modelos']); $x++){
                    echo "<option value=".$_SESSION['modelos'][$x]->id.">".$_SESSION['modelos'][$x]->modelo."</option>";
                }
                echo "</select>";

                echo "<label for='linhas'>Linhas:</label>
                <select id='linhas' name='linha' value='".$_SESSION['produtos'][$id]['linha']->id."'>";
                for($x = 0; $x < count($_SESSION['linhas']); $x++){
                    echo "<option value=".$_SESSION['linhas'][$x]->id.">".$_SESSION['linhas'][$x]->linha."</option>";
                }
                echo "</select>";
            ?>

            <div id="buttons">
                <button id="back" onclick="window.history.back()">CANCELAR</button>
                <input type="submit" value="CONFIRMAR">
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
        </div>
    </form>
</body>

</html>