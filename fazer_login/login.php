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

    // Capturar data e hora atuais
    $data_atual = date('d/m/Y'); // Data no formato 'dd/mm/aaaa'
    $hora_atual = date('H:i:s'); // Hora no formato 'hh:mm:ss'

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

            // Comparar as senhas
            if ($senha === $senha_armazenada) {
                echo "Login bem-sucedido!";

                // Agora vamos registrar o login na tabela "logins"
                $insert_sql = "INSERT INTO logins (email, senha, data, hora) VALUES (?, ?, ?, ?)";

                if ($insert_stmt = $conn->prepare($insert_sql)) {
                    $insert_stmt->bind_param("ssss", $email, $senha, $data_atual, $hora_atual);
                    $insert_stmt->execute();

                    echo " - Login registrado com sucesso!";
                } else {
                    echo "Erro ao registrar o login no banco de dados.";
                }
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
