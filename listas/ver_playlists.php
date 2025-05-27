<?php
session_start();

$conn = new mysqli("localhost", "root", "", "notemusic");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Buscar playlists
$playlists = $conn->query("SELECT * FROM playlists ORDER BY id DESC");

$dados = [];
while ($playlist = $playlists->fetch_assoc()) {
    $id = $playlist['id'];
    $stmt = $conn->prepare("
        SELECT m.capa FROM playlist_musica pm
        JOIN musicas m ON pm.musica_id = m.id
        WHERE pm.playlist_id = ?
        LIMIT 5
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $capas = $result->fetch_all(MYSQLI_ASSOC);
    $playlist['capas'] = $capas;
    $dados[] = $playlist;
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Playlists</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css"> <!-- ou estilos.css -->
    <style>
        .playlist-caixa {
            background-color: #181A1C;
            border-radius: 16px;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 0 12px rgba(0,0,0,0.4);
        }

        .capas-container {
            display: flex;
            gap: 10px;
            margin-bottom: 16px;
            overflow-x: auto;
        }

        .capas-container img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            object-fit: cover;
        }

        .playlist-titulo {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 6px;
            text-align: center;
        }

        .playlist-descricao {
            font-size: 14px;
            color: #ccc;
            text-align: center;
            margin-bottom: 16px;
        }

        .playlist-botoes {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .playlist-botoes button,
        .botao-html button {
            background-color: #8fcfb1;
            color: #181A1C;
            border: none;
            padding: 8px 14px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .titulo-centralizado {
            text-align: center;
            font-size: 28px;
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>
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
                <li><a class="cabecalho-menu-item" href="../busca_artista/pag_artista_html.php">Artista</a></li>
                <li><a class="cabecalho-menu-item" href="../ranking/ranking.html">Ranking</a></li>
            </ul>
            <div class="buscar_box">
                <input type="text" id="pesquisar" name="pesquisar">
                <a href="#" class="buscar_btn">                          
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>
            <div class="perfil-usuario">
            <a href="../perfil_user/perfil_user.php">
                <i class="fa-solid fa-user"></i>
            </a>
        </div>
        </nav>
    </header>

    <main>
        <h1 class="titulo-centralizado">Minhas Playlists</h1>

        <?php foreach ($dados as $playlist): ?>
            <div class="playlist-caixa">
                <div class="capas-container">
                    <?php foreach ($playlist['capas'] as $capa): ?>
                        <img src="<?= htmlspecialchars($capa['capa']) ?>" alt="Capa">
                    <?php endforeach; ?>
                </div>
                <div class="playlist-titulo"><?= htmlspecialchars($playlist['nome']) ?></div>
                <div class="playlist-descricao"><?= htmlspecialchars($playlist['descricao']) ?></div>

                <div class="playlist-botoes">
                    <form action="adicionar_musica.php" method="get">
                        <input type="hidden" name="playlist_id" value="<?= $playlist['id'] ?>">
                        <button type="submit">Adicionar Música</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="botao-html" style="text-align: center; margin-bottom: 40px;">
            <button onclick="window.location.href='criar_playlist.php'">Criar Nova Playlist</button>
        </div>
    </main>

    <footer>
        <p style="text-align: center; padding: 20px 0;">&copy; 2025 NoteMusic. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
