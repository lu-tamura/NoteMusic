<?php
session_start();

$playlist_id = $_SESSION['playlist_id'] ?? null;
$musica_id = $_POST['musica_id'] ?? null;

if (!$playlist_id || !$musica_id) {
    echo "Erro: dados incompletos.";
    exit;
}

$conn = new mysqli("localhost", "root", "", "notemusic");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO playlist_musica (playlist_id, musica_id) VALUES (?, ?)");
$stmt->bind_param("ii", $playlist_id, $musica_id);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: ver_playlists.php");
exit;
?>
