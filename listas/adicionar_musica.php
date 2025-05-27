<?php
session_start();


// Recupera o ID da playlist da URL ou da sessão
if (isset($_GET['playlist_id'])) {
    $playlist_id = $_GET['playlist_id'];
    $_SESSION['playlist_id'] = $playlist_id;
} else {
    $playlist_id = $_SESSION['playlist_id'] ?? null;
}

if (!$playlist_id) {
    echo "Playlist não selecionada. <a href='criar_playlist.php'>Criar uma</a>";
    exit;
}

// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "notemusic");
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Busca por músicas
$resultados = [];
if (isset($_GET['busca'])) {
    $busca = "%" . $_GET['busca'] . "%";
    $stmt = $conn->prepare("SELECT id, musica, artista, capa FROM musicas WHERE musica LIKE ?");
    $stmt->bind_param("s", $busca);
    $stmt->execute();
    $result = $stmt->get_result();
    $resultados = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Músicas à Playlist</title>
    <link rel="stylesheet" href="estilos.css"> <!-- use o mesmo CSS do resto do projeto -->
</head>
<body>

<header class="cabecalho">
        <div class="cabecalho-logo">
            <a href="../home/home.html">
                <img src="notemusic.svg" alt="NOTEMUSIC">
            </a>
        </div>       
        <nav class="cabecalho-menu">
            <ul>
                <li><a class="cabecalho-menu-item" href="../login_user/login.html">Entrar</a></li>
                <li><a class="cabecalho-menu-item" href="../cadastro_user/cadastro.html">Cadastre-se</a></li>
                <li><a class="cabecalho-menu-item" href="../pagmusica/pag_musica_html.php">Música</a></li>
                <li><a class="cabecalho-menu-item" href="../avaliação/avaliacao_mus.php">Avaliações</a></li>
                <li><a class="cabecalho-menu-item" href="../lista/lista.php">Listas</a></li>
                <li><a class="cabecalho-menu-item" href="../registro_musica/registro_mus.php">Adicionar Música</a></li>
            </ul>
            <div class="buscar_box">
                <input type="text" id="pesquisar" name="pesquisar">
                <a href="#" class="buscar_btn">                          
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Adicionar Músicas à Playlist</h1>

            <form method="GET" class="form-busca">
                <label for="busca">Pesquise por uma música:</label>
                <input type="text" id="busca" name="busca" placeholder="Nome da música" required>
                <button type="submit">Pesquisar</button>
            </form>

            <?php if (!empty($resultados)): ?>
                <ul class="resultado-lista">
                    <?php foreach ($resultados as $musica): ?>
                        <li class="resultado-item">
                            <img src="<?= htmlspecialchars($musica['capa']) ?>" alt="Capa" style="max-width: 100px;"><br>
                            <strong><?= htmlspecialchars($musica['musica']) ?></strong><br>
                            Artista: <?= htmlspecialchars($musica['artista']) ?><br>
                            <form method="POST" action="processa_adicao_musica.php">
                                <input type="hidden" name="musica_id" value="<?= $musica['id'] ?>">
                                <button type="submit" class="btn-adicionar">Adicionar à Playlist</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php elseif (isset($_GET['busca'])): ?>
                <p>Música não encontrada. <a href="adicionar_musica.php">Tentar novamente</a></p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 NoteMusic. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
