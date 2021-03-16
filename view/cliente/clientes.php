<?php
include_once('../../models/connect.php');
if (!$_SESSION['user']) {
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
    <link rel="stylesheet" href="../../css/home.css">
</head>

<body>
    <div id="menu_content" class="menu_content">
        <div class="icon_menu">
            <h3 class="full-width">
                ESQUADRITEC
            </h3>
        </div>
        <div class="colunm-2">
            <div class="menu_options">
                <a href="../../view/usuario/new_user.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">FUNCIONÁRIO</div>
                </a>

                <a href="../../view/cliente/new_cliente.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar cliente">
                    <div style="padding-botton: 5px;">CLIENTE</div>
                </a>

                <a href="../../view/usuario/new_user.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar orçamentos">
                    <div style="padding-botton: 5px;">ORÇAMENTO</div>
                </a>

                <a href="../../view/materiais/new_material.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar material">
                    <div style="padding-botton: 5px;">MATERIAL</div>
                </a>

                <a href="../../view/linha/new_linha.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">LINHA</div>
                </a>
                <a href="../../view/modelo/new_modelo.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">MODELO</div>
                </a>
            </div>
        </div>
    </div>

    <div class="navbar">
        <div class="navBody">
            <button id="menu_navbar" class="menu" onclick="openMenu()">
                <img style="width:50px;" src="../../css/img/menu.svg" alt="">
            </button>

            <h3>
                ESQUADRITEC
            </h3>
            <div class="divBusca">
                <input type="text" class="txtBuscar" placeholder="Buscar..." />
                <img src="../../css/img/search.svg" class="imgBusca" alt="Buscar" />
            </div>
            <div class="user">
                <div class="c-c">
                    <img src="../../css/img/account.svg" class="img_user" alt="Usuário logado">
                    <?php
                    echo "<div>" . strtoupper($_SESSION['user']->nome[0]) . "</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="cards">
        <div class="card1">
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
                    for ($x = 0; $x < count($clientes); $x++) {
                        echo
                        "<tr>
                            <td class='nome'>" . $clientes[$x]->nome . "</td>
                            <td class='cpf'>" . $clientes[$x]->cpf . "</td>
                            <td class='cnpj'>" . $clientes[$x]->cnpj . "</td>
                            <td class='email'>" . $clientes[$x]->email . "</td>

                            <td class='cidade'>" . $clientes[$x]->cidade . "</td>
                            <td class='rua'>" . $clientes[$x]->rua . "</td>
                            <td class='bairro'>" . $clientes[$x]->bairro . "</td>
                            <td class='observacao'>" . $clientes[$x]->observacao . "</td>

                            <td class='acao'>
                                <form class='list-component' action='./update_cliente.php' method='POST'>
                                    <input type='hidden' name='id' value=" . $clientes[$x]->id . ">
                                    <input type='hidden' name='nome' value=" . $clientes[$x]->nome . ">
                                    <input type='hidden' name='endereco' value=" . $clientes[$x]->endereco . ">
                                    <input type='hidden' name='cpf' value=" . $clientes[$x]->cpf . ">
                                    <input type='hidden' name='cnpj' value=" . $clientes[$x]->cnpj . ">
                                    <input type='hidden' name='email' value=" . $clientes[$x]->email . ">

                                    <input type='hidden' name='cidade' value=" . $clientes[$x]->cidade . ">
                                    <input type='hidden' name='rua' value=" . $clientes[$x]->rua . ">
                                    <input type='hidden' name='bairro' value=" . $clientes[$x]->bairro . ">
                                    <input type='hidden' name='numero' value=" . $clientes[$x]->numero . ">
                                    <input type='hidden' name='observacao' value=" . $clientes[$x]->observacao . ">
                                    <button type='submit' class='option'><img class='icon' src='../../css/img/update.svg'></button>
                                </form>
                                <form class='list-component' action='../../models/cliente/del_cliente.php' method='POST'>
                                    <input type='hidden' name='id' value=" . $clientes[$x]->id . ">
                                    <button type='submit' class='option'><img class='icon' src='../../css/img/close.svg'></button>
                                </form>
                            </td>
                        </tr>";
                    }
                    ?>
                </table>
            </ul>
        </div>
    </div>



    <div class="full-width card_menssage">
        <?php
        if ($_SESSION['sucess']) {
            echo "
                <div class=''>
                    <div class='sucess c-c'>" . $_SESSION['sucess'] . "</div>
                </div>";
            $_SESSION['sucess'] = '';
        }
        if ($_SESSION["error"]) {
            echo "
                <div class='full-width'>
                    <div class='error c-c'>" . $_SESSION['error'] . "</div>
                </div>";
            $_SESSION['error'] = '';
        }
        ?>
    </div>
</body>
<script>
    window.addEventListener('click', function(e) {
        if (document.getElementById('menu_content').contains(e.target)) {
            // Clicked in box
        } else {
            if (document.getElementById('menu_navbar').contains(e.target)) {
                // Clicked in box
            } else {
                var elemento = document.getElementById("menu_content");
                elemento.style.display = "none";
            }
        }
    });

    function openMenu() {
        var elemento = document.getElementById("menu_content");
        elemento.style.display = "block";
    }
</script>

</html>