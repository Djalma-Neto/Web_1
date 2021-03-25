<?php
include_once('../../models/connect.php');
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
                    <div style="padding-bottom: 5px;">FUNCIONÁRIO</div>
                </a>

                <a href="../../view/cliente/new_cliente.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar cliente">
                    <div style="padding-bottom: 5px;">CLIENTE</div>
                </a>

                <a href="../../view/orcamento/new_orcamento.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar orçamentos">
                    <div style="padding-bottom: 5px;">ORÇAMENTO</div>
                </a>

                <a href="../../view/materiais/new_material.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar material">
                    <div style="padding-bottom: 5px;">MATERIAL</div>
                </a>

                <a href="../../view/linha/new_linha.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-bottom: 5px;">LINHA</div>
                </a>
                <a href="../../view/modelo/new_modelo.php" class="menu_Button">
                    <img style="width:20px;" src="../../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-bottom: 5px;">MODELO</div>
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
                        <th class='nome'>LINHA</th>
                        <th class='acao'>AÇÕES</th>
                    </tr>

                    <?php
                    $linhas = $_SESSION['linhas'];
                    for ($x = 0; $x < count($linhas); $x++) {
                        echo
                        "<tr>
                            <td class='nome'>{$linhas[$x]->linha}</td>
                            <td class='acao'>
                                <form class='list-component' action='./update_linha.php' method='POST'>
                                    <input type='hidden' name='id' value={$linhas[$x]->id}>
                                    <input type='hidden' name='linha' value={$linhas[$x]->linha}>
                                    <button type='submit' class='option'><img class='icon' src='../../css/img/update.svg'></button>
                                </form>
                                <form class='list-component' action='../../models/linha/del_linha.php' method='POST'>
                                    <input type='hidden' name='id' value={$linhas[$x]->id}>
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