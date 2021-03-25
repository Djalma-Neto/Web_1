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
    <form action="../../models/linha/update_linha.php" method="POST">
        <div class="c-c card formulario">
            <?php
            $linha = $_POST['linha'];
            $id = $_POST['id'];
            echo "
                <input class='input_1' type='hidden' name='id' value={$id}>
                <input class='input_1' type='text' name='linha' value=".strval($linha)." required>";
            ?>

            <div id="buttons">
                <button id="back" type="reset" onclick="window.history.back()">CANCELAR</button>
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