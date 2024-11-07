<?php

//PEGANDO OS DADOS DO FORM DO INDEX
/*$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$user = $_POST['user'];
$email = $_POST['email'];
$senha = $_POST['senha'];*/

/*$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : '';
$user = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';*/

$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$sobrenome = isset($_POST['sobrenome']) ? trim($_POST['sobrenome']) : '';
$user = isset($_POST['user']) ? trim($_POST['user']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';


//CONFIG DE CREDENCIAIS
$server = 'localhost';
$usuario = 'root';
$BDsenha = '';
$banco = 'notemusic';

//CONEXAO COM BD
$conn = new mysqli($server, $usuario, $BDsenha, $banco);

//VERIFICAÇÃO DE CONEXAO
if($conn->connect_error){
    die("Falha ao se comunicar com o banco de dados: ".$conn->connect_error);
}

//INSERINDO INFOS NO BD
$smtp = $conn->prepare("INSERT INTO cadastros (nome, sobrenome, `user`, email, senha) VALUES (?,?,?,?,?)");
//("TIPO DAS INFOS DO BD" (STRING, INT, ETC), variaveis que vao pro bd)
$smtp->bind_param("sssss", $nome, $sobrenome, $user, $email, $senha);
//esse "sssss" é s de string, pq as variavel é string


//VERIFICAÇÃO DE EXECUÇÃO
if($smtp->execute()){
    echo "Cadastro feito com sucesso!";
}else{
    echo "Erro no cadastro: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>