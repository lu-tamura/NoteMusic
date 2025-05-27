<?php
session_start();
include '../login_user/verifica_login.php';
verifica_login(); // Proteção com login

// Conexão com o banco de dados
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'notemusic';
$conn = new mysqli($server, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha ao se comunicar com o banco de dados: " . $conn->connect_error);
}

// Pegando os dados do formulário
$musica = $_POST['musica'];
$artista = $_POST['artista'];
$album = $_POST['album'];
$genero = $_POST['genero'];
$capa = $_POST['capa'];

// Inserindo no banco
$smtp = $conn->prepare("INSERT INTO musicas (musica, artista, album, genero, capa) VALUES (?, ?, ?, ?, ?)");
$smtp->bind_param("sssss", $musica, $artista, $album, $genero, $capa);

if ($smtp->execute()) {
    header("Location: registro_mus.php");
    exit();
} else {
    echo "Erro no envio da mensagem: " . $smtp->error;
}

$smtp->close();
$conn->close();
?>
