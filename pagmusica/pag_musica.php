<?php
session_start();

// Conexão com o banco
$conn = new mysqli('localhost', 'root', '', 'notemusic');
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $busca = trim($_POST['search']);
    
    if (!empty($busca)) {
        $stmt = $conn->prepare("SELECT musica, genero, album, artista, capa FROM musicas WHERE musica = ?");
        $stmt->bind_param("s", $busca);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $_SESSION['musica'] = $resultado->fetch_assoc();
            header("Location: mus_escolhida.php");
            exit;
        } else {
            echo "<p>Música não encontrada. <a href='pag_musica.php'>Voltar</a></p>";
        }

        $stmt->close();
    } else {
        echo "<p>Digite o nome da música. <a href='pag_musica.php'>Voltar</a></p>";
    }
}

$conn->close();
?>