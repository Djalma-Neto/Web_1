<?php
include_once('../../models/connect.php');
if(!$_SESSION['user']){
    header("Location: ../../view/");
}
getAllUnidade();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ESQUADRITEC</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/unidade.css">
</head>

<body>
    <div class="cards">
        <div class="card">
            <ul>
            <table>
                <tr>
                    <th class='nome'>NOME</th>
                    <th class='acao'>AÇÕES</th>
                </tr>

                <?php 
                    $unidades = $_SESSION['unidades'];
                    for($x=0; $x < count($unidades); $x++){
                        echo
                        "<tr>
                            <th class='nome'>".$unidades[$x]->nome."</th>
                            <th class='acao'>
                                <form class='list-component' action='./update_unidade.php' method='POST'>
                                    <input type='hidden' name='id' value='{$unidades[$x]->id}'>
                                    <input type='hidden' name='nome' value='{$unidades[$x]->nome}'>
                                    <button type='submit' class='option'><img class='icon' src='../../css/img/update.svg'></button>
                                </form>
                                <form class='list-component' action='../../models/unidade_medida/del_unidade.php' method='POST'>
                                    <input type='hidden' name='id' value='{$unidades[$x]->id}'>
                                    <button type='submit' class='option'><img class='icon' src='../../css/img/close.svg'></button>
                                </form>
                            </th>
                        </tr>";
                    }
                ?>
            </table>
            </ul>
        </div>
    </div>
    
    

    <div class="full-width card_menssage">
        <?php
            if($_SESSION['sucess']){
                echo "
                <div class=''>
                    <div class='sucess c-c'>".$_SESSION['sucess']."</div>
                </div>";
                $_SESSION['sucess'] = '';
            }
            if($_SESSION["error"]){
                echo "
                <div class='full-width'>
                    <div class='error c-c'>".$_SESSION['error']."</div>
                </div>";
                $_SESSION['error'] = '';
            }
        ?>
    </div>
</body>

</html>