<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    die("Usuário não está logado.");
}

// Conexão com o banco
$conn = new mysqli("localhost", "root", "", "notemusic");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// PEGANDO os dados do formulário corretamente:
$nome = $_POST['nome_playlist'] ?? '';
$descricao = $_POST['descricao_playlist'] ?? '';
$usuario_id = $_SESSION['usuario_id'];

// Inserindo no banco
$stmt = $conn->prepare("INSERT INTO playlists (nome, descricao, usuario_id) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Erro no prepare: " . $conn->error);
}

$stmt->bind_param("ssi", $nome, $descricao, $usuario_id);

if ($stmt->execute()) {
    header("Location: adicionar_musica.php?playlist_id=" . $conn->insert_id);
    exit;
} else {
    echo "Erro ao criar playlist: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
