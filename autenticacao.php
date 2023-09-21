<?php
// Inicia a sessão
if (!isset($_SESSION)) {
    session_start();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['nome']) || empty($_SESSION['nome']) || !isset($_SESSION['email']) || empty($_SESSION['email']) || !isset($_SESSION['senha']) || empty($_SESSION['senha'])) {
    // Caso não esteja logado, redireciona para a página de login
    exit();
}

// Verifica se o nome de usuário recebido pelo parâmetro 'usuario' na URL é o mesmo que está na sessão
if (isset($_GET['email']) && $_GET['email'] !== $_SESSION['nome']) {
    // Se não for o mesmo usuário, redireciona para a página de login
    exit();
}

?>
