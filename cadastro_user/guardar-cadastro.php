<?php
$nome = trim($_POST['nome'] ?? '');
$sobrenome = trim($_POST['sobrenome'] ?? '');
$user = trim($_POST['user'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

// Gerar hash seguro
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Config do banco
$server = 'localhost';
$usuario = 'root';
$BDsenha = '';
$banco = 'notemusic';

$conn = new mysqli($server, $usuario, $BDsenha, $banco);

if ($conn->connect_error) {
    die("Erro ao conectar: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO cadastros (nome, sobrenome, `user`, email, senha) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nome, $sobrenome, $user, $email, $senha_hash);

if ($stmt->execute()) {
    header("Location: ../home/home.html");
    exit;
} else {
    echo "Erro no cadastro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
