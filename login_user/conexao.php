<?php
$host = "localhost";
$user = "root";
$senha = ""; // sua senha do MySQL
$banco = "nome_do_banco";

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>