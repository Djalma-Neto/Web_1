<?php
session_start();
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
                <button class="menu_Button" onclick="funcionario_add()">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">FUNCIONÁRIO</div>
                </button>

                <button class="menu_Button" onclick="">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">CLIENTE</div>
                </button>

                <button class="menu_Button" onclick="">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">ORÇAMENTO</div>
                </button>

                <button class="menu_Button" onclick="">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">MATERIAL</div>
                </button>

                <button class="menu_Button" onclick="">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">LINHA</div>
                </button>

                <button class="menu_Button" onclick="">
                    <img style="width:20px;" src="../css/img/add.svg" alt="cadastrar funcionario">
                    <div style="padding-botton: 5px;">MODELO</div>
                </button>
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
            <div id="divBusca">
                <input type="text" id="txtBusca" placeholder="Buscar..." />
                <img src="../css/img/search.svg" id="btnBusca" alt="Buscar" />
            </div>
            <div class="user">
                <div class="c-c">
                    <img src="../css/img/account.svg" alt="">
                    <?php
                        echo "<div>".$_SESSION['user']->NOME."</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="cards">
            <div class="card Orcamentos">
                <h4 class="cardTitle">ORÇAMENTOS CADASTRADOS</h4>
                <h1 class="counter countermateriais">9 <img class="imgDesc" src="../css/img/description.svg" alt=""> </h1>
                <button class="verTodos">VER TODOS</button>
            </div>
            <div class="card Clientes">
                <h4 class="cardTitle">CLIENTES CADASTRADOS</h4>
                <h1 class="counter countermateriais">53 <img class="imgDesc" src="../css/img/description.svg" alt=""> </h1>
                <button class="verTodos">VER TODOS</button>
            </div>
            <div class="card Materiais">
                <h4 class="cardTitle">MATERIAIS CADASTRADOS</h4>
                <h1 class="counter countermateriais">12 <img class="imgDesc" src="../css/img/description.svg" alt=""> </h1>
                <button class="verTodos">VER TODOS</button>
            </div>
        </div>
    </div>

    <div class="Fab">
        <span>+</span>
    </div>

    <div class="graph">
    <div class="users">USUÁRIOS</div>
        <?php
            foreach($_SESSION["usuarios"] as $user){
                echo 
                "<table class='users'>
                    <td>$user->ID</td>
                    <td>$user->NOME</td>
                    <td>$user->EMAIL</td>
                </table>";
            }
        ?>
    </div>
    <script>
        window.addEventListener('click', function(e){   
            if (document.getElementById('menu_content').contains(e.target)){
                // Clicked in box
            } else{
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

        function funcionario_add(){
            window.location.href = "http://localhost/Web_1/view/new_user.php"
        }
    </script>
</body>

</html>