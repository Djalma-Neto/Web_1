<!DOCTYPE html>
<html style="background: none;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPLICATION</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header id="navbar">
    <img id="logomenor"  src="https://cdn.discordapp.com/attachments/695016266578001985/801605949822992434/esquadritec.png" alt="">

    </header>
    <div>
    <div id="container-right">
        <form id="form" action="home.php" method="POST">
            <h2>Nome</h2>
            <input type="text" autocomplete="none" name="name" required>
            <h2>Telefone</h2>
            <input type="tel" autocomplete="none" name="name" required>
            <h2>Usuário</h2>
            <input type="text" autocomplete="none" name="name" required>
            <h2>Senha</h2>
            <input type="password" autocomplete="none" name="name" required>
            <input id="but" type="submit" value="Cadastrar" name="signup"></input>
        </form>
    </div>
    <div id="container-left">
        <div>
            <ul>
                <h3>Permissões do Usuário:</h3>
                <li>Cadastrar Materiais <input id="check" type="checkbox" name="" ></li>
                <li>Cadastrar Fornecedor <input id="check" type="checkbox" name="" ></li>
                <li>Cadastrar Clientes <input id="check" type="checkbox" name="" ></li>
                <li>Cadastrar Produtos <input id="check" type="checkbox" name="" ></li>
                <li>Cadastrar Usuários <input id="check" type="checkbox" name="" ></li>
                <li>Realizar Orçamentos <input id="check" type="checkbox" name="" ></li>
            </ul>
        </div>
    </div>
    </div>
</body>

</html>