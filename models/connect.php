<?php
include_once('class.php');
session_start();

function connect() {
    try {
        // $dataBase = new PDO('pgsql:host=ec2-54-164-22-242.compute-1.amazonaws.com;port=5432;dbname=d9lqe4qcg7qfup;user=vxuphekmmgdsta;password=1342dd32652d25c462a87ac762550b34d56e961234a285ced3e0b2a04c3e5b73');
        $dataBase = new PDO('mysql:host=localhost;dbname=esquadritec;user=root;password=');
        $dataBase->prepare("SET SCHEMA 'esquadritec'");
        return $dataBase;
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error de conexão!: " . $e->getMessage();
        header("Location: ../view");
    }
}

function getAllUser() {
    $dataBase = connect();
    $_SESSION["usuarios"] = array();
    try {
        $usuarios = $dataBase->prepare("SELECT * FROM esquadritec.usuario");
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
        $usuarios = $dataBase->prepare("SELECT * FROM esquadritec.usuario u WHERE u.email = '$user'");
        $usuarios->execute();
        $usuarios = $usuarios->fetchAll(PDO::FETCH_CLASS);
        if(count($usuarios)) {
            $hash = $usuarios[0]->data."".$password;
            if ($hash == base64_decode($usuarios[0]->senha)){
                $_SESSION['user'] = $usuarios[0];
                getAllUser();
                $_SESSION['sucess'] = "Login realizado";
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

function new_user() {
    $dataBase = connect();

    if ($_POST["senha"] !== $_POST["confirm"]){
        $_SESSION["error"] = "Senhas não batem";
        header("Location: ../view/new_user.php");
    }
    $user  = array(
        "nome" => $_POST["nome"],
        "email" => $_POST["email"],
        "password" => $_POST["senha"],
        "admin" => $_POST["admin"]
    );
    try{
        $user = new NewUser($user);
        $user->register($dataBase);
        header("Location: ../../view/home.php");
    }catch (PDOException $e) {
        $_SESSION["error"] = $e->getMessage();
        header("Location: ../view/usuario/new_user.php");
    }
    
}

// CLIENTE

function new_cliente() {
    try {
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
        getAllCliente();

        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../../view/home.php");
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../view/cliente/new_cliente.php");
    }
}

function getAllCliente(){
    $dataBase = connect();
    $_SESSION["clientes"] = array();
    try {
        $clientes = $dataBase->prepare("SELECT c.id, c.nome, c.cpf, c.cnpj, c.email,
        c.endereco, e.observacao, e.rua, e.bairro, e.cidade, e.numero
        FROM esquadritec.cliente c, esquadritec.endereco e WHERE e.id = c.endereco");
        $clientes->execute();
        $clientes = $clientes->fetchAll(PDO::FETCH_CLASS);
        $_SESSION["clientes"] = $clientes;
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}

function update_cliente(){
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $cnpj = $_POST["cnpj"]? $_POST["cnpj"]: '';
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero"];
    $observacao = $_POST["observacao"];
    $id = $_POST['id'];
    $endereco = $_POST['endereco'];

    $dataBase = connect();
    $query = "UPDATE esquadritec.cliente SET nome = '$nome', cpf = '$cpf', cnpj = '$cnpj', email = '$email' WHERE id = '$id'";
    $update = $dataBase->prepare($query);
    $update->execute();

    $query = "UPDATE esquadritec.endereco SET cidade = '$cidade', rua = '$rua', bairro = '$bairro', numero = '$numero',
    observacao = '$observacao' WHERE id = '$endereco'";
    $update = $dataBase->prepare($query);
    $update->execute();

    getAllCliente();
    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: ../../view/home.php");
}

function del_cliente(){
    $id = $_POST["id"];
    $dataBase = connect();
    $query = "DELETE FROM esquadritec.cliente where id = '$id'";
    $delete = $dataBase->prepare($query);
    $delete->execute();
    getAllCliente();
    $_SESSION['sucess'] = 'Deletado!';
    header("Location: ../../view/home.php");
}

// MATERIAL

function new_material(){
    try{
        $dataBase = connect();
        $material = array(
            "nome" => $_POST["nome"],
            "valor" => $_POST["valor"]
        );
        $registro = new newMaterial($material);
        $registro->register($dataBase);
        getAllMaterial();

        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../../view/home.php");
    }catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../view/materiais/new_material.php");
    }
}

function getAllMaterial() {
    $dataBase = connect();
    $_SESSION["materiais"] = array();
    try {
        $materiais = $dataBase->prepare("SELECT * FROM esquadritec.materiais");
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
    $query = "UPDATE esquadritec.materiais SET nome='$nome', valor='$valor' WHERE id='$id'";
    $update = $dataBase->prepare($query);
    $update->execute();
    getAllMaterial();
    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: ../../view/home.php");
}

function del_material(){
    $id = $_POST["id"];
    $dataBase = connect();
    $query = "DELETE FROM esquadritec.materiais where id = '$id'";
    $delete = $dataBase->prepare($query);
    $delete->execute();
    getAllMaterial();
    $_SESSION['sucess'] = 'Deletado!';
    header("Location: ../../view/home.php");
}

// LINHA

function new_linha(){
    try{
        $dataBase = connect();
        $linha = $_POST["linha"];
        $registro = new newLinha($linha);
        $registro->register($dataBase);
        getAllLinha();

        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../../view/home.php");
    }catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../view/linha/new_linha.php");
    }
}

function getAllLinha() {
    $dataBase = connect();
    $_SESSION["linhas"] = array();
    try {
        $linhas = $dataBase->prepare("SELECT * FROM esquadritec.linha");
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
    $query = "UPDATE esquadritec.linha SET linha='$linha' WHERE id='$id'";
    $update = $dataBase->prepare($query);
    $update->execute();
    getAllLinha();
    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: ../../view/home.php");
}

function del_linha(){
    $id = $_POST["id"];
    $dataBase = connect();
    $query = "DELETE FROM esquadritec.linha where id = '$id'";
    $delete = $dataBase->prepare($query);
    $delete->execute();
    getAllLinha();
    $_SESSION['sucess'] = 'Deletado!';
    header("Location: ../../view/home.php");
}

// MODELO

function new_modelo(){
    try{
        $dataBase = connect();
        $modelo = $_POST["modelo"];
        $registro = new newModelo($modelo);
        $registro->register($dataBase);
        getAllModelo();

        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../../view/home.php");
    }catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../view/modelo/new_modelo.php");
    }
}

function getAllModelo() {
    $dataBase = connect();
    $_SESSION["modelos"] = array();
    try {
        $modelos = $dataBase->prepare("SELECT * FROM esquadritec.modelo");
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
    $query = "UPDATE esquadritec.modelo SET modelo='$modelo' WHERE id='$id'";
    $update = $dataBase->prepare($query);
    $update->execute();
    getAllModelo();
    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: ../../view/home.php");
}

function del_modelo(){
    $id = $_POST["id"];
    $dataBase = connect();
    $query = "DELETE FROM esquadritec.modelo where id = '$id'";
    $delete = $dataBase->prepare($query);
    $delete->execute();
    getAllModelo();
    $_SESSION['sucess'] = 'Deletado!';
    header("Location: ../../view/home.php");
}

// UNIDADE

function new_unidade(){
    try{
        $dataBase = connect();
        $unidade = $_POST["unidade"];
        $registro = new newUnidade($unidade);
        $registro->register($dataBase);
        getAllUnidade();

        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../../view/home.php");
    }catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../view/modelo/new_modelo.php");
    }
}

function getAllUnidade() {
    $dataBase = connect();
    $_SESSION["unidades"] = array();
    try {
        $unidades = $dataBase->prepare("SELECT * FROM esquadritec.unidade_medida");
        $unidades->execute();
        $unidades = $unidades->fetchAll(PDO::FETCH_CLASS);
        $_SESSION["unidades"] = $unidades;
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}

function update_unidade(){
    $id = $_POST["id"];
    $nome = $_POST["nome"];

    $dataBase = connect();
    $query = "UPDATE esquadritec.unidade_medida SET nome='$nome' WHERE id='$id'";
    $update = $dataBase->prepare($query);
    $update->execute();
    getAllUnidade();
    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: ../../view/home.php");
}

function del_unidade(){
    $id = $_POST["id"];
    $dataBase = connect();
    $query = "DELETE FROM esquadritec.unidade_medida where id = '$id'";
    $delete = $dataBase->prepare($query);
    $delete->execute();
    getAllUnidade();
    $_SESSION['sucess'] = 'Deletado!';
    header("Location: ../../view/home.php");
}

// PRODUTO

function new_produto(){
    try{
        if(count($_SESSION['material_produto']) == 0){
            $_SESSION['error'] = 'Adicione os Materiais!';
            header("Location: ../../view/produto/new_produto.php");
            return 0;
        }
        $produto = array(
            "produto" => $_POST['produto'],
            "modelo" => $_POST['modelo'],
            "linha" => $_POST['linha'],
            "materiais" => $_SESSION['material_produto']
        );
        foreach($_SESSION['modelos'] as $modelo){
            if($modelo->id == $produto['modelo']){
                $produto['modelo'] = $modelo;
            }
        }
        foreach($_SESSION['linhas'] as $linha){
            if($linha->id == $produto['linha']){
                $produto['linha'] = $linha;
            }
        }
        array_push($_SESSION['produtos'], $produto);
        $_SESSION['material_produto'] = array();
        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../../view/orcamento/new_orcamento.php");
    }catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../../view/produto/new_produto.php");
    }
}

function new_material_produto(){
    try{
        foreach($_SESSION['materiais'] as $value){
            if($value->id == $_POST['material']){
                $material = array(
                    "material" => $value,
                    "quantidade" => $_POST['quantidade'],
                    "unidade_medida" => $_POST['unidades']
                );
            }
        }
        array_push($_SESSION['material_produto'], $material);
        $_SESSION['sucess'] = 'Cadastrado!';
        header("Location: ../../view/produto/new_produto.php");
    }catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../../view/produto/material_produto.php");
    }
}

function update_material_produto(){
    $id = $_POST["id"];
    $quantidade = $_POST["quantidade"];
    $material_id = $_POST["material"];

    foreach($_SESSION['materiais'] as $value){
        if($value->id == $material_id){
            $_SESSION['material_produto'][$id]['material'] = $value;
        }
    }

    $_SESSION['material_produto'][$id]['quantidade'] = $quantidade;

    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: ../../view/produto/new_produto.php");
}

function del_material_produto(){
    $id = $_POST["id"];
    unset($_SESSION['material_produto'][$id]);

    $_SESSION['sucess'] = 'Deletado!';
    header("Location: ../../view/produto/new_produto.php");
}

function update_produto(){
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $modelo_id = $_POST["modelo"];
    $linha_id = $_POST["linha"];

    $_SESSION['produtos'][$id]['produto'] = $nome;

    foreach($_SESSION['modelos'] as $modelo){
        if($modelo->id == $modelo_id){
            $_SESSION['produtos'][$id]['modelo'] = $modelo;
        }
    }
    foreach($_SESSION['linhas'] as $linha){
        if($linha->id == $produto['linha']){
            $_SESSION['produtos'][$id]['linha'] = $linha;
        }
    }

    $_SESSION['sucess'] = 'Atualizado!';
    header("Location: ../../view/orcamento/new_orcamento.php");
}

function del_produto(){
    $id = $_POST["id"];
    unset($_SESSION['produtos'][$id]);
    $_SESSION['sucess'] = 'Deletado!';
    header("Location: ../../view/orcamento/new_orcamento.php");
}

// ORCAMENTO

function new_orcamento(){
    try{
        $dataBase = connect();
        $orcamento = array(
            "produtos" => $_SESSION['produtos'],
            "cliente" => $_POST['cliente'],
            "desconto" => $_POST['desconto'],
            "observacao" => $_POST['observacao']
        );

        $registro = new newOrcamento($orcamento);
        $registro->register($dataBase);

        $_SESSION['material_produto'] = array();
        $_SESSION['produtos'] = array();
        $_SESSION['sucess'] = 'Cadastrado!';
        getAllOrcamento();
        header("Location: ../../view/home.php");
    }catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: ../../view/produto/new_produto.php");
    }
}

function getAllOrcamento(){
    $_SESSION["orcamentos"] =  array();
    $dataBase = connect();
    try {
        $orcamentos = $dataBase->prepare("SELECT * FROM esquadritec.orcamento");
        $orcamentos->execute();
        $orcamentos = $orcamentos->fetchAll(PDO::FETCH_CLASS);

        foreach ($orcamentos as $x) {
            $var_orcamento = array(
                'id' => 0,
                'observacao' => '',
                'desconto' => 0,
                'status' => '',
                'valor_t_b' => 0,
                'valor_f' => 0,
                'data' => '',
                'cliente' => 0,
                'produtos' => array(),
            );
            $var_produtos = array(
                'id' => 0,
                'nome' => '',
                'valor' => 0,
                'orcamento' => 0,
                'modelo' => 0,
                'linha' => 0,
                'materiais' => array()
            );
            $produtos = $dataBase->prepare("SELECT * FROM esquadritec.produto p where p.orcamento = $x->id");
            $produtos->execute();
            $produtos = $produtos->fetchAll(PDO::FETCH_CLASS);

            $var_orcamento['id'] = $x->id;
            $var_orcamento['observacao'] = $x->observacao;
            $var_orcamento['desconto'] = $x->desconto;
            $var_orcamento['status'] = $x->status;
            $var_orcamento['valor_t_b'] = $x->valor_t_b;
            $var_orcamento['valor_f'] = $x->valor_f;
            $var_orcamento['valor_f'] = $x->valor_f;
            $var_orcamento['valor_f'] = $x->valor_f;
            $var_orcamento['data'] = $x->data;

            $cliente = $dataBase->prepare("SELECT * FROM esquadritec.cliente c where c.id = $x->cliente");
            $cliente->execute();
            $cliente = $cliente->fetchAll(PDO::FETCH_CLASS);
            $var_orcamento['cliente'] = $cliente[0];

            foreach($produtos as $p){
                $m_produtos = $dataBase->prepare("SELECT * FROM esquadritec.material_produto mp
                where mp.produto = $p->id");
                $m_produtos->execute();
                $m_produtos = $m_produtos->fetchAll(PDO::FETCH_CLASS);

                $var_produtos['id'] = $p->id;
                $var_produtos['nome'] = $p->nome;
                $var_produtos['valor'] = $p->valor;
                $var_produtos['orcamento'] = $p->orcamento;

                foreach($_SESSION["modelos"] as $modelo){
                    if($modelo->id == $p->modelo){
                        $var_produtos['modelo'] = $modelo;
                    }
                }

                foreach($_SESSION["linhas"] as $linha){
                    if($linha->id == $p->linha){
                        $var_produtos['linha'] = $linha;
                    }
                }

                foreach($m_produtos as $mp){
                    $materiais = $dataBase->prepare("SELECT * FROM esquadritec.materiais m
                    where m.id = $mp->id");
                    $materiais->execute();
                    $materiais = $materiais->fetchAll(PDO::FETCH_CLASS);
                    array_push($var_produtos['materiais'], $materiais);
                }
                array_push($var_orcamento['produtos'], $var_produtos);
            }
            array_push($_SESSION["orcamentos"], $var_orcamento);
        }
    } catch (PDOException $e) {
        $_SESSION["error"] = "Error!: " . $e->getMessage() . "<br/>";
    }
}
?>