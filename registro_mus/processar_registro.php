<?php

//CONFIG DE CREDENCIAIS
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'notemusic';

//CONEXAO COM BD
$conn = new mysqli($server, $usuario, $senha, $banco);

//VERIFICAÇÃO DE CONEXAO
if($conn->connect_error){
    die("Falha ao se comunicar com o banco de dados: ".$conn->connect_error);
}


//PEGANDO OS DADOS DO FORM DO INDEX
$musica = $_POST['musica'];
$artista = $_POST['artista'];
$album = $_POST['album'];
$genero = $_POST['genero'];


//INSERINDO INFOS NO BD
$smtp = $conn->prepare("INSERT INTO musicas (musica, artista, album, genero) VALUES (?,?,?,?)");
//("TIPO DAS INFOS DO BD" (STRING, INT, ETC), variaveis que vao pro bd)
$smtp->bind_param("ssss", $musica, $artista, $album, $genero);
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