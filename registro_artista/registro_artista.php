<?php
include '../login_user/verifica_login.php';
verifica_login();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/df734a7ba9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="registro_artista.css" />
    <title>Registrar Artista</title>
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho-logo">
            <a href="../home/home.html">
                <img src="notemusic.svg" alt="NOTEMUSIC" />
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

    <main class="conteudo">
        <div class="informacoes">
            <h1 class="conteudo-titulo">Cadastrar Artista</h1>
        
            <form action="processar_registro_artista.php" method="post">
                <input type="text" name="nome" placeholder="Nome do artista" required /><br />

                <input type="text" name="foto" placeholder="Link da foto do artista" /><br />
                
                <select name="genero" required>
                    <option value="" disabled selected>Escolha um gênero</option>
                    <option value="Rock">Rock</option>
                    <option value="Pop">Pop</option>
                    <option value="Jazz">Jazz</option>
                    <option value="Sertanejo">Sertanejo</option>
                    <option value="Hip-hop">Hip-Hop</option>
                    <option value="Eletrônica">Eletrônica</option>
                    <option value="Pagode">Pagode</option>
                    <option value="Samba">Samba</option>
                    <option value="Kpop">Kpop</option>
                    <option value="Infantil">Infantil</option>
                </select><br />

                <textarea name="descricao" placeholder="Descrição do artista" rows="4"></textarea><br />
                
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </main>
</body>
</html>