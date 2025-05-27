<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/df734a7ba9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">
    <title>Criar Playlist</title>
</head>
<body>
    <!-- Cabeçalho -->
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

    <!-- Conteúdo Principal -->
    <main>
        <div class="container">
            <h1>Criar Playlist</h1>
            <form method="POST" action="processa_criacao_playlist.php">
                <label for="nome_playlist">Nome da Playlist:</label>
                <input type="text" id="nome_playlist" name="nome_playlist" required>
                
                <label for="descricao_playlist">Descrição (opcional):</label>
                <textarea id="descricao_playlist" name="descricao_playlist" rows="4" placeholder="Descrição da playlist"></textarea>
                
                <button type="submit">Criar Playlist</button>
            </form>
        </div>
    </main>

</body>
</html>