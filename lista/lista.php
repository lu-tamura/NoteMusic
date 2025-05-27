<?php
session_start();
include '../login_user/verifica_login.php';
verifica_login(); // Proteção com login
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/df734a7ba9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="lista.css">
    <title>Melhores Listas</title>
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
        <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 20px;">
            <a href="../listas/criar_playlist.php">
                <button style="background-color: #8fcfb1; color: #181a1c; padding: 10px 20px; font-size: 16px; border: none; border-radius: 8px; cursor: pointer;">
                    Criar Playlist
                </button>
            </a>

            <a href="../listas/ver_playlists.php">
                <button style="background-color: #8fcfb1; color: #181a1c; padding: 10px 20px; font-size: 16px; border: none; border-radius: 8px; cursor: pointer;">
                    Ver Playlist
                </button>
            </a>
         </div>

        <h2>Melhores listas</h2>
        <div class="lista">
            <div class="capas">
                <img src="capa1.jpg" alt="Capa 1">
                <img src="capa2.jpg" alt="Capa 2">
                <img src="capa3.jpg" alt="Capa 3">
                <img src="capa4.jpg" alt="Capa 4">
                <img src="capa5.jpg" alt="Capa 5">
                <img src="capa6.jpg" alt="Capa 6">
                <img src="capa7.jpg" alt="Capa 7">
                <img src="capa8.jpg" alt="Capa 8">
                <img src="capa9.jpg" alt="Capa 9">
                <img src="capa10.jpg" alt="Capa 10">
            </div>
            <h3>Nós mulheres meio tropicanas</h3>
            <p>o inesperado pode ser bom ou ruim, você que decide.</p>
            <div class="usuario">
                <img src="user1.jpg" alt="Usuário">
                <span>xz.sofis</span>
            </div>
        </div>

        <div class="lista">
            <div class="capas">
                <img src="capa11.jpg" alt="Capa 11">
                <img src="capa12.jpg" alt="Capa 12">
                <img src="capa13.jpg" alt="Capa 13">
                <img src="capa14.jpg" alt="Capa 14">
                <img src="capa15.jpg" alt="Capa 15">
                <img src="capa16.jpg" alt="Capa 16">
                <img src="capa17.jpg" alt="Capa 17">
                <img src="capa18.jpg" alt="Capa 18">
                <img src="capa19.jpg" alt="Capa 19">
                <img src="capa20.jpg" alt="Capa 20">              
            </div>
            <h3>female rage: the musical</h3>
            <p>WHOS AFRAID OF LITTLE OLD ME? you should be.</p>
            <div class="usuario">
                <img src="user2.jpg" alt="Usuário">
                <span>meg</span>
            </div>
        </div>
        <div class="lista">
            <div class="capas">
                <img src="capa21.jpg" alt="Capa 21">
                <img src="capa22.jpg" alt="Capa 22">
                <img src="capa23.jpg" alt="Capa 23">
                <img src="capa24.jpg" alt="Capa 24">
                <img src="capa25.jpg" alt="Capa 25">
                <img src="capa26.jpg" alt="Capa 26">
                <img src="capa27.jpg" alt="Capa 27">
                <img src="capa28.jpg" alt="Capa 28">
                <img src="capa29.jpg" alt="Capa 29">
                <img src="capa30.jpg" alt="Capa 30">
            </div>
            <h3>hola muchachos</h3>
            <p>os 5 anos de espanhol não foram em vão!!</p>
            <div class="usuario">
                <img src="user3.jpg" alt="Usuário">
                <span>aninha</span>
            </div>
        </div>
        <div class="lista">
            <div class="capas">
                <img src="capa31.jpg" alt="Capa 31">
                <img src="capa32.jpg" alt="Capa 32">
                <img src="capa33.jpg" alt="Capa 33">
                <img src="capa34.jpg" alt="Capa 34">
                <img src="capa35.jpg" alt="Capa 35">
                <img src="capa36.jpg" alt="Capa 36">
                <img src="capa37.jpg" alt="Capa 37">
                <img src="capa38.jpg" alt="Capa 38">
                <img src="capa39.jpg" alt="Capa 39">
                <img src="capa40.jpg" alt="Capa 40">
            </div>
            <h3>Brasil anos 2000 foi o motivo do meu colapso doutor</h3>
            <p>vai tudo misturado mesmo</p>
            <div class="usuario">
                <img src="user4.jpg" alt="Usuário">
                <span>alessandra</span>
            </div>
        </div>
        <div class="lista">
            <div class="capas">
                <img src="capa41.jpg" alt="Capa 41">
                <img src="capa42.jpg" alt="Capa 42">
                <img src="capa43.jpg" alt="Capa 43">
                <img src="capa44.jpg" alt="Capa 44">
                <img src="capa45.jpg" alt="Capa 45">
                <img src="capa46.jpg" alt="Capa 46">
                <img src="capa47.jpg" alt="Capa 47">
                <img src="capa48.jpg" alt="Capa 48">
                <img src="capa49.jpg" alt="Capa 49">
                <img src="capa50.jpg" alt="Capa 50">
            </div>
            <h3>mpb</h3>
            <div class="usuario">
                <img src="user5.jpg" alt="Usuário">
                <span>gabriella lima</span>
            </div>
        </div>
    </main>
</body>
</html>
