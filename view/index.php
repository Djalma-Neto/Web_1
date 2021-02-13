<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPLICATION</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <img class="logo" src="https://cdn.discordapp.com/attachments/695016266578001985/801605949822992434/esquadritec.png" alt="logo esquadritec">
    <div class="c-c card p-a-m b" style="max-width: 500px; height: 200px">
        <form action="../models/login.php" method="POST" class="">
            <div class="stage">
                <input class="b s-s" type="text" name="usuario" required  placeholder="Login">
            </div>

            <div class="stage">
                <input class="b s-s" type="password" name="senha" required placeholder="Senha">
            </div>

            <input  class="b" id="but" type="submit" value="Entrar" name="signup"></input>
        </form>
    </div>
</body>

</html>