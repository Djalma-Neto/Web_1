<?php

class NewUser{
    private $nome = '';
    private $email = '';
    private $password = '';
    private $admin = 0;

    function __construct($user){
        date_default_timezone_set('America/Bahia');
        $this->nome = $user['nome'];
        $this->email = $user['email'];
        $this->admin = $user['admin']?$user['admin']:0;
        $this->date = date("Y-m-dH:i");
        $this->password = base64_encode($this->date.''.$user['password']);
    }

    public function register($dataBase) {
        $query = "INSERT INTO esquadritec.usuario(nome, senha, email, data, admin) values('$this->nome', '$this->password', '$this->email', '$this->date', '$this->admin')";
        $register = $dataBase->prepare($query);
        $register->execute();
    }
}

class NewCliente{
    private $nome;
    private $cpf;
    private $cnpj;
    private $email;
    private $cidade;
    private $rua;
    private $bairro;
    private $numero;
    private $observacao;

    function __construct($cliente){
        $this->nome = $cliente["nome"];
        $this->cpf = $cliente["cpf"];
        $this->cnpj = $cliente["cnpj"]?$cliente["cnpj"]:'';
        $this->email = $cliente["email"]?$cliente["email"]:'';

        $this->cidade = $cliente["cidade"];
        $this->rua = $cliente["rua"];
        $this->bairro = $cliente["bairro"];
        $this->numero = $cliente["numero"];
        $this->observacao = $cliente["observacao"];
    }

    public function register($dataBase) {
        $query = "INSERT INTO esquadritec.endereco(cidade, rua, bairro, numero, observacao) values('$this->cidade', '$this->rua', '$this->bairro', '$this->numero', '$this->observacao')";
        $register = $dataBase->prepare($query);
        $register->execute();

        $query = "SELECT * FROM esquadritec.endereco e WHERE e.cidade = '$this->cidade' and e.rua = '$this->rua' and e.numero = '$this->numero'";
        $get = $dataBase->prepare($query);
        $get->execute();
        $get = $get->fetchAll(PDO::FETCH_CLASS);
        $get = $get[0]->id;

        $query = "INSERT INTO esquadritec.cliente(nome, cpf, cnpj, email, endereco) values('$this->nome', '$this->cpf', '$this->cnpj', '$this->email', '$get')";
        $register = $dataBase->prepare($query);
        $register->execute();
    }
}

class newMaterial{
    private $nome;
    private $valor;

    function __construct($material){
        $this->nome = $material["nome"];
        $this->valor = $material["valor"];
    }

    public function register($dataBase) {
        $query = "INSERT INTO esquadritec.materiais(nome, valor) values('$this->nome', '$this->valor')";
        $register = $dataBase->prepare($query);
        $register->execute();

        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../view/home.php");
    }
}

class newLinha{
    private $linha;

    function __construct($linha){
        $this->linha = $linha;
    }

    public function register($dataBase) {
        $query = "INSERT INTO esquadritec.linha(linha) values('$this->linha')";
        $register = $dataBase->prepare($query);
        $register->execute();

        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../view/home.php");
    }
}

class newModelo{
    private $modelo;

    function __construct($modelo){
        $this->modelo = $modelo;
    }

    public function register($dataBase) {
        $query = "INSERT INTO esquadritec.modelo(modelo) values('$this->modelo')";
        $register = $dataBase->prepare($query);
        $register->execute();

        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../view/home.php");
    }
}
?>