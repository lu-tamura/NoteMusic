<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <style>
        body {
            background-color: #181A1C;
            color: white;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        a {
            color: #8fcfb1;
            text-decoration: none;
            margin-top: 20px;
        }
        a:hover {
            color: #b6e5d4;
        }
    </style>
</head>
<body>
    <h2>Você saiu da sua conta com sucesso.</h2>
    <a href="../login_user/login.html">Voltar para o login</a>
</body>
</html>