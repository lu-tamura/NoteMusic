<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notemusic";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar a consulta SQL para evitar SQL Injection
    $sql = "SELECT senha FROM cadastros WHERE email = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Verificar se o e-mail já existe no banco de dados
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($senha_armazenada);
            $stmt->fetch();

            // Remover espaços extras antes da comparação
            $senha = trim($senha);
            $senha_armazenada = trim($senha_armazenada);

            // Exibir as senhas para depuração
            echo "Senha armazenada no banco de dados (em texto simples): <br>";
            var_dump($senha_armazenada); // Usamos var_dump para visualizar caracteres invisíveis
            echo "<br>";

            echo "Senha fornecida pelo usuário: <br>";
            var_dump($senha); // Usamos var_dump para visualizar caracteres invisíveis
            echo "<br>";

            // Comparar as senhas
            if ($senha === $senha_armazenada) {
                echo "Login bem-sucedido!";
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "E-mail não registrado.";
        }

        $stmt->close();
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
