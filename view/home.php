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
            <img class="user" src="../css/img/account.svg" alt="">
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

    </div>
</body>

</html>