<?php
include_once('./class.php');
session_start();

function connect() {
    try {
        $dsn = 'mysql:host=localhost;dbname=esquadritec';
        $username = 'root';
        $password = '';
        $dataBase = new PDO('mysql:host=localhost;dbname=esquadritec', $username, $password);
        return $dataBase;
    } catch (PDOException $e) {
        $_SESSION["error_login"] = "Error de conexão!: " . $e->getMessage();
        header("Location: ../view");
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
            if (validatePassword('1', $password, $usuarios[0]->SENHA)){
                $_SESSION['user'] = $usuarios[0];
                getAllUser();
                header("Location: ../view/home.php");
            } else {
                $_SESSION["error_login"] = "Senha invalida";
                header("Location: ../view/login.php");
            }
        } else {
            $_SESSION["error_login"] = "E-mail não cadastrado";
            header("Location: ../view/login.php");
        }
    } catch (PDOException $e) {
        $_SESSION["error_login"] = "Error!: " . $e->getMessage() . "<br/>";
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
    $user = $_POST["nome"];
    $email = $_POST["email"];
    $admin = $_POST["admin"];
    $password = $_POST["senha"];
    $password_2 = $_POST["confirm"];

    if ($password !== $password_2){
        $_SESSION["error_newUser"] = "Senhas não batem";
        header("Location: ../view/new_user.php");
    }
    $user = new NewUser($user, $email, $admin, $password);
    $user->register($dataBase);
}
?>