<?php
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
            if ($usuarios[0]->SENHA == $password){
                $_SESSION["user"] = $usuarios;
                getAllUser();
                header("Location: ../view/home.php");
            } else {
                $_SESSION["error_login"] = "Falha de autenticação";
                header("Location: ../view");
            }
        } else {
            $_SESSION["error_login"] = "Falha de autenticação";
            header("Location: ../view");
        }
    } catch (PDOException $e) {
        $_SESSION["error_login"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}
?>