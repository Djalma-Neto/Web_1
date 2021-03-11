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
                            <th class='nome'>".$clientes[$x]->NOME."</th>
                            <th class='cpf'>".$clientes[$x]->CPF."</th>
                            <th class='cnpj'>".$clientes[$x]->CNPJ."</th>
                            <th class='email'>".$clientes[$x]->EMAIL."</th>

                            <th class='cidade'>".$clientes[$x]->CIDADE."</th>
                            <th class='rua'>".$clientes[$x]->RUA."</th>
                            <th class='bairro'>".$clientes[$x]->BAIRRO."</th>
                            <th class='observacao'>".$clientes[$x]->OBSERVACAO."</th>

                            <th class='acao'>
                                <form class='list-component' action='./update_cliente.php' method='POST'>
                                    <input type='hidden' name='id' value=".$clientes[$x]->ID.">
                                    <input type='hidden' name='nome' value=".$clientes[$x]->NOME.">
                                    <input type='hidden' name='endereco' value=".$clientes[$x]->ENDERECO.">
                                    <input type='hidden' name='cpf' value=".$clientes[$x]->CPF.">
                                    <input type='hidden' name='cnpj' value=".$clientes[$x]->CNPJ.">
                                    <input type='hidden' name='email' value=".$clientes[$x]->EMAIL.">

                                    <input type='hidden' name='cidade' value=".$clientes[$x]->CIDADE.">
                                    <input type='hidden' name='rua' value=".$clientes[$x]->RUA.">
                                    <input type='hidden' name='bairro' value=".$clientes[$x]->BAIRRO.">
                                    <input type='hidden' name='numero' value=".$clientes[$x]->NUMERO.">
                                    <input type='hidden' name='observacao' value=".$clientes[$x]->OBSERVACAO.">
                                    <button type='submit' class='option'><img class='icon' src='../../css/img/update.svg'></button>
                                </form>
                                <form class='list-component' action='../../models/cliente/del_cliente.php' method='POST'>
                                    <input type='hidden' name='id' value=".$clientes[$x]->ID.">
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