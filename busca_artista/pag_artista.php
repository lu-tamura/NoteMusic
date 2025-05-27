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
        $stmt = $conn->prepare("SELECT nome, genero, descricao, img FROM artistas WHERE nome = ?");
        if (!$stmt) {
            die("Erro no prepare: " . $conn->error);
        }
        
        $stmt->bind_param("s", $busca);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $_SESSION['artista'] = $resultado->fetch_assoc();
            header("Location: artista_escolhido.php");
            exit;
        } else {
            echo "<p>Artista não encontrado. <a href='pag_artista_html.php'>Voltar</a></p>";
        }

        $stmt->close();
    } else {
        echo "<p>Digite o nome do artista. <a href='pag_artista_html.php'>Voltar</a></p>";
    }
}

$conn->close();
?>
