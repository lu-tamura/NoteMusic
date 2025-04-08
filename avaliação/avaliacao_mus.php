<?php
include '../login_user/verifica_login.php';
verifica_login();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação</title>
    <link rel="stylesheet" href="avaliacao_mus_1.css">
</head>
<body>

    <header class="cabecalho">
        <img class="cabecalho-logo" src="notemusic.svg" alt="NOTEMUSIC">       
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
            <h1>Avaliação de Música</h1>
            <form action="processar_avaliacao.php" method="post">

                <input type="text" name="musica" placeholder="Música" required>
                <input type="text" name="artista" placeholder="Artista" required>
                <input type="text" name="album" placeholder="Álbum" required>
                <textarea name="avaliacao" rows="5" placeholder="Digite sua avaliação" required></textarea>

                <div class="rating">
                    <input value="5" name="rating" id="star5" type="radio">
                    <label title="5 estrelas" for="star5"></label>
                
                    <input value="4" name="rating" id="star4" type="radio">
                    <label title="4 estrelas" for="star4"></label>
                
                    <input value="3" name="rating" id="star3" type="radio" checked>
                    <label title="3 estrelas" for="star3"></label>
                
                    <input value="2" name="rating" id="star2" type="radio">
                    <label title="2 estrelas" for="star2"></label>
                
                    <input value="1" name="rating" id="star1" type="radio">
                    <label title="1 estrela" for="star1"></label>
                </div>


                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>
