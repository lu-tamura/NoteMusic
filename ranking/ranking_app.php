<?php
include '../login_user/verifica_login.php';
verifica_login();

// Conexão com o banco
$conn = new mysqli("localhost", "root", "", "notemusic");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Consulta corrigida com base na sua tabela real
$sql = "
    SELECT 
        m.id,
        m.musica,
        m.artista,
        m.album,
        m.genero,
        m.capa,
        ROUND(AVG(a.rating), 2) AS media_nota,
        COUNT(a.id) AS total_avaliacoes
    FROM musicas m
    JOIN avaliacoes a ON m.id = a.musica_id
    GROUP BY m.id
    ORDER BY media_nota DESC, total_avaliacoes DESC
";

$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta SQL: " . $conn->error);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/df734a7ba9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="ranking_app.css">
    <title>Rankings</title>
</head>
<body>
    <header class="cabecalho">
        <div class="cabecalho-logo">
            <img  src="notemusic.svg" alt="NOTEMUSIC">   
        </div>
        <nav class="cabecalho-menu">
            <ul>
                <li><a class="cabecalho-menu-item" href="#">Entrar</a></li>
                <li><a class="cabecalho-menu-item" href="#">Cadastrar</a></li>
                <li><a class="cabecalho-menu-item" href="#">Música</a></li>
                <li><a class="cabecalho-menu-item" href="#">Avaliações</a></li>
                <li><a class="cabecalho-menu-item" href="#">Listas</a></li>
                <li><a class="cabecalho-menu-item" href="#">Adicionar Música</a></li>
            </ul>
            <div class="buscar_box">
                <input type="text" id="pesquisar" name="pesquisar">
                <a href="#" class="buscar_btn">                          
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </div>
        </nav>
    </header>
        <div class="botao-html">
        <button type="button" onclick="window.location.href='ranking.html'">
            Ver Rankings
        </button>
        </div>

    <h1 class="titulo-centralizado">Músicas Mais Bem Avaliadas</h1>

<?php
if ($result->num_rows > 0) {
    while ($musica = $result->fetch_assoc()) {
        echo '<div class="ranking-musica">';
        echo '<img src="' . htmlspecialchars($musica['capa']) . '" alt="Capa">';
        echo '<div class="info-texto">';
        echo '<h2>' . htmlspecialchars($musica['musica']) . '</h2>';
        echo '<p>Artista: ' . htmlspecialchars($musica['artista']) . '</p>';
        echo '<p>Álbum: ' . htmlspecialchars($musica['album']) . '</p>';
        echo '<p>Gênero: ' . htmlspecialchars($musica['genero']) . '</p>';
        echo '<p class="nota">Nota média: ' . $musica['media_nota'] . ' (avaliado por ' . $musica['total_avaliacoes'] . ' usuário(s))</p>';
        echo '</div></div>';
    }
}
?>

</body>
</html>
