<?php

$email = $_POST['email'];
$senha = $_POST['senha'];
$data_atual = date('d/m/Y');
$hora_atual = date('H:i:s');

//CONFIGURAÇÕES DE CREDENCIAIS
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco= 'notemusic';

//CONEXÃO COM O BD
$conn = new mysqli($server, $usuario, $senha, $banco);

//VERIFICAR CONEXÃO
if($conn->connect_error){
    die("Falha ao se conectar com o Banco de dados: ".$conn->connect_error);
}

$smtp = $conn->prepare("INSERT INTO logins (email, senha, data, hora) VALUES (?,?,?,?)");
$smtp->bind_param("ssss",$email,$senha,$data_atual,$hora_atual );

if($smtp->execute()){
    echo "Login feito com sucesso!";
}else{
    echo "Erro no login: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>