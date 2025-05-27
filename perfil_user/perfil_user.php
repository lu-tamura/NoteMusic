<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login_user/login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notemusic";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$id = $_SESSION['usuario_id'];

// Buscando dados do usuário
$stmt = $conn->prepare("SELECT nome, sobrenome, user, email, img FROM cadastros WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
$stmt->close();

$img = $usuario['img'] ? $usuario['img'] : 'default.png'; // imagem padrão, altere para a url ou arquivo que quiser

$msg = '';

// Alterar imagem de perfil
if (isset($_POST['alterar_img'])) {
    $nova_img = trim($_POST['nova_img']);
    if (filter_var($nova_img, FILTER_VALIDATE_URL)) {
        $stmt = $conn->prepare("UPDATE cadastros SET img = ? WHERE id = ?");
        $stmt->bind_param("si", $nova_img, $id);
        if ($stmt->execute()) {
            $msg = "Imagem alterada com sucesso!";
            $img = $nova_img;
        } else {
            $msg = "Erro ao alterar imagem.";
        }
        $stmt->close();
    } else {
        $msg = "URL inválida.";
    }
}

// Alterar senha
if (isset($_POST['alterar_senha'])) {
    $nova_senha = $_POST['nova_senha'];
    if (strlen($nova_senha) >= 6) {
        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE cadastros SET senha = ? WHERE id = ?");
        $stmt->bind_param("si", $senha_hash, $id);
        if ($stmt->execute()) {
            $msg = "Senha alterada com sucesso!";
        } else {
            $msg = "Erro ao alterar senha.";
        }
        $stmt->close();
    } else {
        $msg = "A senha deve ter pelo menos 6 caracteres.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="perfil_user.css">
</head>
<body>



<div class="perfil-container">

    <h1>Perfil do Usuário</h1>

    <?php if (!empty($msg)) echo "<p class='message'>$msg</p>"; ?>

    <img class="perfil-img" src="<?= htmlspecialchars($img) ?>" alt="Imagem de perfil">

    <h2><?= htmlspecialchars($usuario['nome'] . ' ' . $usuario['sobrenome']) ?></h2>
    <p>Usuário: <?= htmlspecialchars($usuario['user']) ?></p>
    <p>Email: <?= htmlspecialchars($usuario['email']) ?></p>

    <button onclick="window.location.href='../home/home.html'">Voltar à Home</button>

    <h2>Alterar Imagem de Perfil</h2>
    <form method="POST" action="">
        <input type="url" name="nova_img" placeholder="URL da nova imagem" required>
        <button type="submit" name="alterar_img">Alterar Imagem</button>
    </form>

    <h2>Alterar Senha</h2>
    <form method="POST" action="">
        <input type="password" name="nova_senha" placeholder="Nova senha" required minlength="6">
        <button type="submit" name="alterar_senha">Alterar Senha</button>
    </form>
    
</div>

</body>
</html>
