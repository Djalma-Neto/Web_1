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
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="cards">
        <div class="card">
            <ul>
            <table>
                <tr>
                    <th class='nome'>NOME</th>
                    <th class='acao'>CPF</th>
                    <th class='acao'>CNPJ</th>
                    <th class='acao'>EMAIL</th>
                    <th class='acao'>CIDADE</th>
                    <th class='acao'>RUA</th>
                    <th class='acao'>BAIRRO</th>
                    <th class='acao'>OBSERVACAO</th>
                    <th class='acao'>AÇÕES</th>
                </tr>

                <?php 
                    $clientes = $_SESSION['clientes'];
                    for($x=0; $x < count($clientes); $x++){
                        echo
                        "<tr>
                            <th class='nome'>".$clientes[$x]->nome."</th>
                            <th class='cpf'>".$clientes[$x]->cpf."</th>
                            <th class='cnpj'>".$clientes[$x]->cnpj."</th>
                            <th class='email'>".$clientes[$x]->email."</th>

                            <th class='cidade'>".$clientes[$x]->cidade."</th>
                            <th class='rua'>".$clientes[$x]->rua."</th>
                            <th class='bairro'>".$clientes[$x]->bairro."</th>
                            <th class='observacao'>".$clientes[$x]->observacao."</th>

                            <th class='acao'>
                                <form class='list-component' action='./update_cliente.php' method='POST'>
                                    <input type='hidden' name='id' value=".$clientes[$x]->id.">
                                    <input type='hidden' name='nome' value=".$clientes[$x]->nome.">
                                    <input type='hidden' name='endereco' value=".$clientes[$x]->endereco.">
                                    <input type='hidden' name='cpf' value=".$clientes[$x]->cpf.">
                                    <input type='hidden' name='cnpj' value=".$clientes[$x]->cnpj.">
                                    <input type='hidden' name='email' value=".$clientes[$x]->email.">

                                    <input type='hidden' name='cidade' value=".$clientes[$x]->cidade.">
                                    <input type='hidden' name='rua' value=".$clientes[$x]->rua.">
                                    <input type='hidden' name='bairro' value=".$clientes[$x]->bairro.">
                                    <input type='hidden' name='numero' value=".$clientes[$x]->numero.">
                                    <input type='hidden' name='observacao' value=".$clientes[$x]->observacao.">
                                    <button type='submit' class='option'><img class='icon' src='../../css/img/update.svg'></button>
                                </form>
                                <form class='list-component' action='../../models/cliente/del_cliente.php' method='POST'>
                                    <input type='hidden' name='id' value=".$clientes[$x]->id.">
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