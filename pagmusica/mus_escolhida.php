<?php
session_start();

// Verifica se os dados da música estão na sessão
if (!isset($_SESSION['musica'])) {
    die("Nenhuma música selecionada. <a href='pag_musica_html.php'>Voltar</a>");
}

$musica = $_SESSION['musica'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Música Escolhida</title>
    <link rel="stylesheet" href="mus_escolhida.css">
</head>
<body>
    <div class="container-musica">
        <div class="capa">
            <img src="<?= htmlspecialchars($musica['capa']) ?>" alt="Capa da música">
        </div>
        
        <div class="info-musica">
            <h2><?= htmlspecialchars($musica['musica']) ?></h2>
            <p><strong>Gênero:</strong> <?= htmlspecialchars($musica['genero']) ?></p>
            <p><strong>Álbum:</strong> <?= htmlspecialchars($musica['album']) ?></p>
            <p><strong>Artista:</strong> <?= htmlspecialchars($musica['artista']) ?></p>
        </div>
        
        <button onclick="window.location.href='pag_musica_html.php'">Buscar outra música</button>
        <button onclick="window.location.href='../listas/adicionar_musica.php'">Adicionar na Playlist</button>
    </div>
</body>
</html>
