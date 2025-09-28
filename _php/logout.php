<?php
// Inicia a sessão para poder aceder às variáveis de sessão.
session_start();

// session_unset() remove todas as variáveis da sessão (ex: 'usuario_id', 'usuario_nome').
session_unset();

// session_destroy() destrói a sessão por completo.
session_destroy();

// Redireciona o utilizador de volta para a página inicial.
// O utilizador agora será visto como um visitante.
header("Location: ../index.php");
exit(); // Garante que nenhum outro código seja executado após o redirecionamento.
?>