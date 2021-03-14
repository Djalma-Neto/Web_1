<?php
session_start();
if(!$_SESSION['user']){
    header("Location: ../view/login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPLICATION</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/home.css">
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
                <a href="../view/usuario/new_user.php" class="menu_Button">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">FUNCIONÁRIO</div>
                </a>

                <a href="../view/cliente/new_cliente.php" class="menu_Button">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar cliente">
                    <div style="padding-botton: 5px;">CLIENTE</div>
                </a>

                <a href="../view/usuario/new_user.php" class="menu_Button">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar orçamentos">
                    <div style="padding-botton: 5px;">ORÇAMENTO</div>
                </a>

                <a href="../view/materiais/new_material.php" class="menu_Button">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar material">
                    <div style="padding-botton: 5px;">MATERIAL</div>
                </a>

                <a href="../view/linha/new_linha.php" class="menu_Button">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">LINHA</div>
                </a>
                <a href="../view/modelo/new_modelo.php" class="menu_Button">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">MODELO</div>
                </a>
            </div>
        </div>
    </div>

    <div class="navbar">
        <div class="navBody">
            <button id="menu_navbar" class="menu" onclick="openMenu()">
                <img style="width:50px;" src="../css/img/menu.svg" alt="">
            </button>

            <h3>
                ESQUADRITEC
            </h3>
            <div class="divBusca">
                <input type="text" class="txtBuscar" placeholder="Buscar..." />
                <img src="../css/img/search.svg" class="imgBusca" alt="Buscar" />
            </div>
            <div class="user">
                <div class="c-c">
                    <img src="../css/img/account.svg" class="img_user" alt="Usuário logado">
                    <?php
                        echo "<div>".strtoupper($_SESSION['user']->nome[0])."</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div  class='c-c'>
        <div class="cards">
            <div class="card">
                <h4 class="cardTitle">ORÇAMENTOS CADASTRADOS</h4>
                <h1 class="counter countermateriais"><?php echo count($_SESSION['materiais']) ?> <img class="imgDesc" src="../css/img/description.svg" alt="ORÇAMENTOS cadastrados"> </h1>
                <a href="" class="verTodos">VER TODOS</a>
            </div>
            <div class="card">
                <h4 class="cardTitle">CLIENTES CADASTRADOS</h4>
                <h1 class="counter countermateriais"><?php echo count($_SESSION['clientes']) ?> <img class="imgDesc" src="../css/img/description.svg" alt="CLIENTES cadastrados"> </h1>
                <a href="../models/cliente/getAllCliente.php"
                class="verTodos" onclick="GetAllCliente()">VER TODOS</a>
            </div>
            <div class="card">
                <h4 class="cardTitle">MATERIAIS CADASTRADOS</h4>
                <h1 class="counter countermateriais"><?php echo count($_SESSION['materiais']) ?> <img class="imgDesc" src="../css/img/description.svg" alt="materiais cadastrados"> </h1>
                <a href="../models/material/getAllMaterial.php"
                class="verTodos" onclick="GetAllMaterial()">VER TODOS</a>
            </div>
            <div class="card">
                <h4 class="cardTitle">MODELOS CADASTRADOS</h4>
                <h1 class="counter countermateriais"><?php echo count($_SESSION['modelos']) ?> <img class="imgDesc" src="../css/img/description.svg" alt="modelos cadastrados"> </h1>
                <a href="../models/modelo/getAllModelo.php"
                class="verTodos" onclick="GetAllModelos()">VER TODOS</a>
            </div>
            <div class="card">
                <h4 class="cardTitle">LINHAS CADASTRADAS</h4>
                <h1 class="counter countermateriais"><?php echo count($_SESSION['linhas']) ?> <img class="imgDesc" src="../css/img/description.svg" alt="modelos cadastrados"> </h1>
                <a href="../models/linha/getAllLinha.php"
                class="verTodos" onclick="GetAllLinha()">VER TODOS</a>
            </div>
        </div>
    </div>

    <div class="fab">
        <span class="btn_dropdown">+</span>
    </div>

    <div class="graph">
        <div class="users">USUÁRIOS</div>
        <?php
            foreach($_SESSION["usuarios"] as $user){
                echo 
                "<table class='users'>
                    <td>$user->id</td>
                    <td>$user->nome</td>
                    <td>$user->email</td>
                </table>";
            }
        ?>
    </div>
    <div class="full-width card_menssage">
        <?php
            if($_SESSION['sucess']){
                echo "
                <div class='full-width'>
                    <div class='sucess c-c'>".$_SESSION['sucess']."</div>
                </div>";
                $_SESSION['sucess'] = '';
            }
            if($_SESSION['error']){
                echo "
                <div class='full-width'>
                    <div class='error c-c'>".$_SESSION['error']."</div>
                </div>";
                $_SESSION['error'] = '';
            }
        ?>
    </div>
    <script>
        window.addEventListener('click', function(e){   
            if (document.getElementById('menu_content').contains(e.target)){
                // Clicked in box
            }else{
                if (document.getElementById('menu_navbar').contains(e.target)){
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
</body>

</html>