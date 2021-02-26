<?php
class User{
    public $nome = '';
    private $email = '';
    private $admin = 0;

    function __construct($nome, $email, $admin){
        $this->nome = $nome;
        $this->email = $email;
        $this->admin = $admin;
    }

    public function getName() {
        echo $nome;
    }

    public function getEmail() {
        echo $email;
    }

    public function getPrivilege() {
        echo $admin;
    }
}

class NewUser{
    private $nome = '';
    private $email = '';
    private $password = '';
    private $admin = 0;

    function __construct($nome, $email, $admin, $password){
        $this->nome = $nome;
        $this->email = $email;
        $this->admin = $admin;
        $this->date = date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 3000));
        $this->password = base64_encode('1'.$password);
    }

    public function register($dataBase) {
        try{
            $query = "INSERT INTO usuario(nome, senha, email, admin) values('$this->nome', '$this->password', '$this->email', '$this->admin')";
            $register = $dataBase->prepare($query);
            $register->execute();
            header("Location: ../view/new_user.php");
        }catch (PDOException $e) {
            $_SESSION["error_newUser"] = $e->getMessage();
            header("Location: ../view/new_user.php");
        }
    }
}
?>