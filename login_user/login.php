<?php
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notemusic";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Consulta ao banco
    $sql = "SELECT id, nome, senha FROM cadastros WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $nome, $senha_bd);
            $stmt->fetch();

            // Comparação usando password_verify (para senha com hash)
            if (password_verify($senha, $senha_bd)) {
                // Login válido → criar sessão
                $_SESSION['usuario_id'] = $id;
                $_SESSION['usuario_nome'] = $nome;
                $_SESSION['usuario_email'] = $email;

                // Redireciona para a home
                header("Location: ../home/home.html");
                exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "E-mail não encontrado.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
