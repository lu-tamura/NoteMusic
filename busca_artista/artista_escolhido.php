<?php
session_start();

if (!isset($_SESSION['artista'])) {
    die("Nenhum artista selecionado. <a href='pag_artista_html.php'>Voltar</a>");
}

$artista = $_SESSION['artista'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Artista Escolhido</title>
    <link rel="stylesheet" href="artista_escolhido.css" />
</head>
<body>
    <div class="container-artista">
        <div class="foto-artista">
            <img src="<?= htmlspecialchars($artista['img']) ?>" alt="Foto do artista" />
        </div>
        
        <div class="info-artista">
            <h2><?= htmlspecialchars($artista['nome']) ?></h2>
            <p><strong>Gênero:</strong> <?= htmlspecialchars($artista['genero']) ?></p>
            <p><strong>Descrição:</strong> <?= nl2br(htmlspecialchars($artista['descricao'])) ?></p>
        </div>
        
        <button onclick="window.location.href='pag_artista_html.php'">Buscar outro artista</button>
    </div>
</body>
</html>
