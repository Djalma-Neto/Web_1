<?php
include_once('../../models/connect.php');
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
    <link rel="stylesheet" href="../../css/materiais.css">
</head>

<body>
    <div class="cards">
        <div class="card">
            <ul>
            <table>
                <tr>
                    <th class='nome'>LINHA</th>
                    <th class='acao'>AÇÕES</th>
                </tr>

                <?php 
                    $linhas = $_SESSION['linhas'];
                    for($x=0; $x < count($linhas); $x++){
                        echo
                        "<tr>
                            <th class='nome'>".$linhas[$x]->LINHA."</th>
                            <th class='acao'>
                                <form class='list-component' action='./update_linha.php' method='POST'>
                                    <input type='hidden' name='id' value=".$linhas[$x]->ID.">
                                    <input type='hidden' name='linha' value=".$linhas[$x]->LINHA.">
                                    <button type='submit' class='option'><img class='icon' src='../../css/img/update.svg'></button>
                                </form>
                                <form class='list-component' action='../../models/linha/del_linha.php' method='POST'>
                                    <input type='hidden' name='id' value=".$linhas[$x]->ID.">
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