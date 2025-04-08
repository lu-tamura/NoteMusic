<?php
include '../login_user/verifica_login.php';
verifica_login();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/df734a7ba9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="pag_musica.css">
    <title>Pesquisa de Músicas</title>
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
        <h1>Pesquisa de Músicas</h1>
        <form method="POST" action="pag_musica.php">
            <input type="text" name="search" placeholder="Digite o nome da música" required>
            <button type="submit">Buscar</button>
        </form>
    </div>
    </main>
</body>
</html>
