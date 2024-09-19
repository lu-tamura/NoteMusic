<?php

//PEGANDO OS DADOS DO FORM DO INDEX
$musica = $_POST['musica'];
$album = $_POST['album'];
$mensagem = $_POST['mensagem'];
//Y= ano abreviado
$data_atual = date('d/m/Y');
//H= hora, i = minutos
$hora_atual = date('H:i:s');

//CONFIG DE CREDENCIAIS
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'aula_formulario';

//CONEXAO COM BD
$conn = new mysqli($server, $usuario, $senha, $banco);

//VERIFICAÇÃO DE CONEXAO
if($conn->connect_error){
    die("Falha ao se comunicar com o banco de dados: ".$conn->connect_error);
}

//INSERINDO INFOS NO BD
$smtp = $conn->prepare("INSERT INTO mensagens (musica, album, mensagem, data, hora) VALUES (?,?,?,?,?)");
//("TIPO DAS INFOS DO BD" (STRING, INT, ETC), variaveis que vao pro bd)
$smtp->bind_param("sssss", $musica, $album, $mensagem, $data_atual, $hora_atual);
//esse "sssss" é s de string, pq as variavel é string


//VERIFICAÇÃO DE EXECUÇÃO
if($smtp->execute()){
    echo "Mensagem enviada com sucesso!";
}else{
    echo "Erro no envio da mensagem: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>