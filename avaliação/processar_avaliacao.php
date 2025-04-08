<?php
session_start();

// Dados do formulário
$nome_musica = trim($_POST['musica'] ?? '');
$avaliacao = trim($_POST['avaliacao'] ?? '');
$rating = $_POST['rating'] ?? 0;
$data_atual = date('d/m/Y');
$hora_atual = date('H:i:s');

// Conexão com o banco
$conn = new mysqli('localhost', 'root', '', 'notemusic');
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Normaliza o nome da música para evitar problemas de maiúsculas/minúsculas
$stmt_busca = $conn->prepare("SELECT id FROM musicas WHERE LOWER(TRIM(musica)) = LOWER(TRIM(?))");
$stmt_busca->bind_param("s", $nome_musica);
$stmt_busca->execute();
$stmt_busca->store_result();

if ($stmt_busca->num_rows === 0) {
    echo "Música não encontrada. Verifique o nome digitado.";
    $stmt_busca->close();
    $conn->close();
    exit();
}

$stmt_busca->bind_result($musica_id);
$stmt_busca->fetch();
$stmt_busca->close();

// Insere a avaliação com o ID encontrado
$stmt_insert = $conn->prepare("INSERT INTO avaliacoes (musica_id, avaliacao, data_atual, hora_atual, rating) VALUES (?, ?, ?, ?, ?)");
$stmt_insert->bind_param("issss", $musica_id, $avaliacao, $data_atual, $hora_atual, $rating);

if ($stmt_insert->execute()) {
    header("Location: ../ranking/ranking_app.php"); // ✅ Redireciona para o ranking
    exit();
} else {
    echo "Erro ao registrar avaliação: " . $stmt_insert->error;
}

$stmt_insert->close();
$conn->close();
?>
