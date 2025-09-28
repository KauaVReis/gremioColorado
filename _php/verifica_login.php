<?php
// Inicia a sessão para poder verificar o estado de login.
// Deve ser uma das primeiras coisas a ser executada no script.
session_start();

// Verifica se a variável de sessão 'usuario_id' NÃO está definida.
// Se não estiver, significa que o utilizador não está logado.
if (!isset($_SESSION['usuario_id'])) {

    // O JavaScript na página inicial irá ler este parâmetro e abrir o modal de cadastro.
    header("Location: index.php?acao=registrar");

    // Garante que nenhum outro código seja executado após o redirecionamento.
    exit();
}
// Se a sessão existir, o script simplesmente termina, e a página protegida
?>