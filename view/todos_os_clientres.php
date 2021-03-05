<html>

<head>
    <meta charset="utf-8">
    <title>TODOS OS CLIENTES</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
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
                    /*                         echo "<div>".$_SESSION['user']->NOME."</div>";
 */                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="navTabela">
        <table border="2">
            <thead>
                <h1>TODOS OS CLIENTES</h1>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>José</td>
                    <td>jose.asloco@hotmail.com</td>
                    <td>(77)981456754</td>
                    <td><button class='editButton'>Editar</button> <button class='excludeButton'>Excluir</button></td>
                </tr>
                <tr>
                    <td>Antoin</td>
                    <td>antoincariocinha@hotmail.com</td>
                    <td>(51)10945854</td>
                    <td><button class='editButton'>Editar</button> <button class='excludeButton'>Excluir</button></td>
                </tr>
                <tr>
                    <td>Antoin</td>
                    <td>antoincariocinha@hotmail.com</td>
                    <td>(51)10945854</td>
                    <td><button class='editButton'>Editar</button> <button class='excludeButton'>Excluir</button></td>
                </tr>
                <tr>
                    <td>Antoin</td>
                    <td>antoincariocinha@hotmail.com</td>
                    <td>(51)10945854</td>
                    <td><button class='editButton'>Editar</button> <button class='excludeButton'>Excluir</button></td>
                </tr>
                <tr>
                    <td>Antoin</td>
                    <td>antoincariocinha@hotmail.com</td>
                    <td>(51)10945854</td>
                    <td><button class='editButton'>Editar</button> <button class='excludeButton'>Excluir</button></td>
                </tr>
                <tr>
                    <td>Antoin</td>
                    <td>antoincariocinha@hotmail.com</td>
                    <td>(51)10945854</td>
                    <td><button class='editButton'>Editar</button> <button class='excludeButton'>Excluir</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>