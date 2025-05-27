<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function verifica_login() {
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: ../login_user/login.html");
        exit();
    }
}
?>