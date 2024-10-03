<?php

include("processar_registro.php");

//PEGANDO OS DADOS DO FORM DO INDEX
$musica = $_POST['musica'];
$artista = $_POST['artista'];
$album = $_POST['album'];
$genero = $_POST['genero'];


//INSERINDO INFOS NO BD
$smtp = $conn->prepare("INSERT INTO musicas (musica, artista, album, genero) VALUES (VARCHAR 255,VARCHAR 255, VARCHAR 255, )");
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