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
$nome = $_POST['nome'];  // ✅ Correção aqui
$genero = $_POST['genero'];
$descricao = $_POST['descricao'];
$foto = $_POST['foto']; // Mantém como 'foto', sem problemas

// Inserindo no banco - 'foto' está salva como 'img'
$stmt = $conn->prepare("INSERT INTO artistas (nome, genero, descricao, img) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    die("Erro no prepare: " . $conn->error);
}

$stmt->bind_param("ssss", $nome, $genero, $descricao, $foto);

if ($stmt->execute()) {
    header("Location: registro_artista.php");
    exit();
} else {
    echo "Erro no envio da mensagem: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
