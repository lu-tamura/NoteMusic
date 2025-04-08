<?php
session_start();

// Conexão com o banco
$conn = new mysqli("localhost", "root", "", "notemusic");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Recupera ID da playlist
$playlistId = $_SESSION['playlist_id'] ?? null;

if (!$playlistId) {
    die("Nenhuma playlist selecionada.");
}

// Consulta dados da playlist
$sqlPlaylist = "SELECT nome, descricao FROM playlists WHERE id = ?";
$stmtPlaylist = $conn->prepare($sqlPlaylist);
$stmtPlaylist->bind_param("i", $playlistId);
$stmtPlaylist->execute();
$resultPlaylist = $stmtPlaylist->get_result();
$playlist = $resultPlaylist->fetch_assoc();

// Consulta músicas da playlist
$sqlMusicas = "
    SELECT m.capa
    FROM playlist_musica pm
    JOIN musicas m ON pm.musica_id = m.id
    WHERE pm.playlist_id = ?
";
$stmtMusicas = $conn->prepare($sqlMusicas);
$stmtMusicas->bind_param("i", $playlistId);
$stmtMusicas->execute();
$resultMusicas = $stmtMusicas->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Playlist Criada</title>
    <link rel="stylesheet" href="mus_escolhida.css">
</head>
<body>
    <div class="container-playlist">
        <div class="capas">
            <?php while ($musica = $resultMusicas->fetch_assoc()): ?>
                <img src="<?= htmlspecialchars($musica['capa']) ?>" alt="Capa da música">
            <?php endwhile; ?>
        </div>
        <div class="playlist-info">
            <h2><?= htmlspecialchars($playlist['nome']) ?></h2>
            <p><?= htmlspecialchars($playlist['descricao']) ?></p>
        </div>
        <button onclick="window.location.href='adicionar_musicas_html'">Adicionar mais músicas</button>
    </div>
</body>
</html>

<?php
$conn->close();
?>
