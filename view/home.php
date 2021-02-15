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
    <div class="navbar">
        <div class="navBody">
            <img class="menu" src="../css/img/menu.svg" alt="">
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
                        echo "<div>".$_SESSION['user'][0]->NOME."</div>"
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="cards">
            <div class="card Orcamentos"></div>
            <div class="card Clientes"></div>
            <div class="card Materiais"></div>
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
</body>

</html>