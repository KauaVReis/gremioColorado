<?php
// Inclui o nosso "guarda" para garantir que apenas utilizadores logados acedem a esta página.
require_once 'verifica_login.php';

// Verificação de nível de acesso.
// Se o nível do utilizador não for 1 (admin), ele é redirecionado para a página inicial.
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 1) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Grêmio Colorado</title>
    <link rel="stylesheet" href="../_css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c707ea077b.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="admin-container">
        <div class="logo">
            <img src="../_imagens/gremioColoradoLogo.png" alt="Logo Grêmio Colorado">
        </div>

        <h1>PAINEL ADMINISTRATIVO</h1>

        <div class="admin-menu">
            <a href="listar_usuarios.php" class="admin-botao">
                <span class="admin-botao-icone">
                    <i class="fas fa-users"></i>
                </span>
                Listar Usuários
            </a>
            <a href="#" class="admin-botao">
                <span class="admin-botao-icone">
                    <i class="fas fa-calendar-plus"></i>
                </span>
                Gerenciar Eventos (Em breve)
            </a>
            <a href="#" class="admin-botao">
                <span class="admin-botao-icone">
                    <i class="fas fa-cog"></i>
                </span>
                Configurações (Em breve)
            </a>
        </div>

        <a href="../index.php" class="link-voltar">Voltar ao Site</a>
    </div>

</body>

</html>

