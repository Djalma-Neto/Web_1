<?php
include_once('class.php');
session_start();

function connect() {
    try {
        $dsn = 'mysql:host=localhost;dbname=esquadritec';
        $username = 'root';
        $password = '';
        $dataBase = new PDO('mysql:host=localhost;dbname=esquadritec', $username, $password);
        return $dataBase;
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error de conexão!: " . $e->getMessage();
        header("Location: ../view");
    }
}

function getAllCliente($nome) {
    $dataBase = connect();
    try {
        $clientes = $dataBase->prepare("SELECT * FROM cliente c WHERE c.nome like '%$nome%'");
        $clientes->execute();
        $clientes = $clientes->fetchAll(PDO::FETCH_CLASS);
        $_SESSION["clientes"] = $usuarios;
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}

function getAllUser() {
    $dataBase = connect();
    try {
        $usuarios = $dataBase->prepare("SELECT * FROM usuario");
        $usuarios->execute();
        $usuarios = $usuarios->fetchAll(PDO::FETCH_CLASS);
        $_SESSION["usuarios"] = $usuarios;
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}

function login() {
    $user = $_POST["usuario"];
    $password = $_POST["senha"];

    $dataBase = connect();
    try {
        $usuarios = $dataBase->prepare("SELECT * FROM usuario u WHERE u.email = ".$dataBase->quote($user));
        $usuarios->execute();
        $usuarios = $usuarios->fetchAll(PDO::FETCH_CLASS);
        if(count($usuarios)) {
            if (validatePassword($usuarios[0]->data, $password, $usuarios[0]->SENHA)){
                $_SESSION['user'] = $usuarios[0];
                getAllUser();
                header("Location: ../view/home.php");
            } else {
                $_SESSION["error"] = "Senha invalida";
                header("Location: ../view/login.php");
            }
        } else {
            $_SESSION["error"] = "E-mail não cadastrado";
            header("Location: ../view/login.php");
        }
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}

function validatePassword($date, $password, $password_hash) {
    $value = $date.''.$password;
    $value_2 = base64_decode($password_hash);
    if ($value == $value_2){
        return true;
    }else{
        return false;
    }
}

function new_user() {
    $dataBase = connect();

    if ($_POST["senha"] !== $_POST["confirm"]){
        $_SESSION["error"] = "Senhas não batem";
        header("Location: http://localhost/Web_1/models/view/new_user.php");
    }
    $user  = array(
        "nome" => $_POST["nome"],
        "email" => $_POST["email"],
        "password" => $_POST["senha"],
        "admin" => $_POST["admin"]
    );
    $user = new NewUser($user);
    $user->register($dataBase);
}

function new_cliente() {
    $dataBase = connect();
    $cliente = array(
        "nome" => $_POST["nome"],
        "cpf" => $_POST["cpf"],
        "cnpj" => $_POST["cnpj"],
        "email" => $_POST["email"],

        "cidade" => $_POST["cidade"],
        "rua" => $_POST["rua"],
        "bairro" => $_POST["bairro"],
        "numero" => $_POST["numero"],
        "observacao" => $_POST["observacao"]
    );
    $cliente = new NewCliente($cliente);
    $cliente->register($dataBase);
}

// MATERIAL

function new_material(){
    $dataBase = connect();
    $material = array(
        "nome" => $_POST["nome"],
        "valor" => $_POST["valor"]
    );
    $registro = new newMaterial($material);
    $registro->register($dataBase);
    getAllMaterial();
}

function getAllMaterial() {
    $dataBase = connect();
    try {
        $materiais = $dataBase->prepare("SELECT * FROM materiais");
        $materiais->execute();
        $materiais = $materiais->fetchAll(PDO::FETCH_CLASS);
        $_SESSION["materiais"] = $materiais;
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}

function update_material(){
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];

    $dataBase = connect();
    $query = "UPDATE materiais SET nome='$nome', valor='$valor' WHERE id='$id'";
    $update = $dataBase->prepare($query);
    $update->execute();
    getAllMaterial();
    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: http://localhost/Web_1/view/home.php");
}

function del_material(){
    $id = $_POST["id"];
    $dataBase = connect();
    $query = "DELETE FROM materiais where id = '$id'";
    $delete = $dataBase->prepare($query);
    $delete->execute();
    getAllMaterial();
    $_SESSION['sucess'] = 'Deletado!';
    header("Location: http://localhost/Web_1/view/home.php");
}

// LINHA

function new_linha(){
    $dataBase = connect();
    $linha = $_POST["linha"];
    $registro = new newLinha($linha);
    $registro->register($dataBase);
    getAllLinha();
}

function getAllLinha() {
    $dataBase = connect();
    try {
        $linhas = $dataBase->prepare("SELECT * FROM linha");
        $linhas->execute();
        $linhas = $linhas->fetchAll(PDO::FETCH_CLASS);
        $_SESSION["linhas"] = $linhas;
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}

function update_linha(){
    $id = $_POST["id"];
    $linha = $_POST["linha"];

    $dataBase = connect();
    $query = "UPDATE linha SET linha='$linha' WHERE id='$id'";
    $update = $dataBase->prepare($query);
    $update->execute();
    getAllLinha();
    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: http://localhost/Web_1/view/home.php");
}

function del_linha(){
    $id = $_POST["id"];
    $dataBase = connect();
    $query = "DELETE FROM linha where id = '$id'";
    $delete = $dataBase->prepare($query);
    $delete->execute();
    getAllLinha();
    $_SESSION['sucess'] = 'Deletado!';
    header("Location: http://localhost/Web_1/view/home.php");
}

// MODELO

function new_modelo(){
    $dataBase = connect();
    $modelo = $_POST["modelo"];
    $registro = new newModelo($modelo);
    $registro->register($dataBase);
    getAllModelo();
}

function getAllModelo() {
    $dataBase = connect();
    try {
        $modelos = $dataBase->prepare("SELECT * FROM modelo");
        $modelos->execute();
        $modelos = $modelos->fetchAll(PDO::FETCH_CLASS);
        $_SESSION["modelos"] = $modelos;
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}

function update_modelo(){
    $id = $_POST["id"];
    $modelo = $_POST["modelo"];

    $dataBase = connect();
    $query = "UPDATE modelo SET modelo='$modelo' WHERE id='$id'";
    $update = $dataBase->prepare($query);
    $update->execute();
    getAllModelo();
    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: http://localhost/Web_1/view/home.php");
}

function del_modelo(){
    $id = $_POST["id"];
    $dataBase = connect();
    $query = "DELETE FROM modelo where id = '$id'";
    $delete = $dataBase->prepare($query);
    $delete->execute();
    getAllModelo();
    $_SESSION['sucess'] = 'Deletado!';
    header("Location: http://localhost/Web_1/view/home.php");
}
?>