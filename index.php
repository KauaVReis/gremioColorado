<?php
// Inicia a sessão no topo de tudo. Essencial para verificar o estado de login.
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grêmio Colorado</title>
    <link rel="stylesheet" href="_css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c707ea077b.js" crossorigin="anonymous"></script>
    <script src="_js/script.js"></script>
</head>

<body>

    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="navbar-logo">
                <img src="_imagens/gremioColoradoLogo.png" alt="Logo Grêmio Colorado">
            </a>
            <ul class="navbar-menu">
                <li><a href="index.php" class="active">Início</a></li>
                <li><a href="galeria.php">Galeria</a></li>
                <li><a href="calendario.php">Agenda</a></li>
            </ul>

            <!-- ÁREA DINÂMICA DA NAVBAR -->
            <?php if (isset($_SESSION['usuario_id'])):
                $fotoPerfil = isset($_SESSION['usuario_localFoto']) && !empty($_SESSION['usuario_localFoto'])
                    ? $_SESSION['usuario_localFoto']
                    : '_imagens/imagem (10).png';
                ?>
                <div class="navbar-user-area">
                    <span class="welcome-message">Bem-vindo,
                        <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</span>
                    <img src="<?php echo htmlspecialchars($fotoPerfil); ?>" alt="Foto de Perfil" class="profile-pic">
                    <a href="_php/logout.php" class="logout-link">Sair</a>
                </div>
            <?php else: ?>
                <!-- Mostra isto se o utilizador NÃO ESTIVER logado -->
                <div class="navbar-login">
                    <a href="#" id="loginBtn">Login</a>
                </div>
            <?php endif; ?>

        </div>
    </nav>

    <main class="main-container">

        <!-- CARD DE NOVIDADES DINÂMICO -->
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <!-- Versão para utilizador logado -->
            <section class="card-novidades">
                <div>
                    <h2>Você já faz parte da nossa comunidade!</h2>
                    <p>Fique de olho na agenda para não perder nenhum evento.</p>
                </div>
                <a href="calendario.html" class="btn-vermelho">Ver próximos eventos</a>
            </section>
        <?php else: ?>
            <!-- Versão para visitante -->
            <section class="card-novidades">
                <div>
                    <h2>Fique por dentro das novidades!</h2>
                    <p>Festas, Torneios, passeios e muito mais! Tudo em um lugar só!</p>
                </div>
                <a href="#" class="btn-vermelho" id="registerBtn">Acesse o site</a>
            </section>
        <?php endif; ?>

        <section class="secao-conteudo">
            <h3 class="titulo-secao">Galeria</h3>
            <div class="grid-galeria">
                <img src="_imagens/imagem (3).png" alt="Imagem da galeria 1">
                <img src="_imagens/imagem (8).png" alt="Imagem da galeria 2" class="imagem-destaque">
                <img src="_imagens/imagem (15).png" alt="Imagem da galeria 3">
            </div>
            <a href="galeria.html" class="btn-dourado">Ver galeria completa</a>
        </section>

        <section class="secao-conteudo">
            <h3 class="titulo-secao">Agenda</h3>
            <div class="item-agenda">
                <span>&#8226;</span>
                <p><strong>26/09:</strong> Apresentação Grêmio Colorado.</p>
            </div>
            <div class="item-agenda">
                <span>&#8226;</span>
                <p><strong>27/09:</strong> Apresentação Grêmio Colorado.</p>
            </div>
            <div class="item-agenda">
                <span>&#8226;</span>
                <p><strong>28/09:</strong> Apresentação Grêmio Colorado.</p>
            </div>
            <div class="agenda-link-container">
                <p class="texto-link">Veja todos eventos registrados</p>
                <i class="fas fa-chevron-down icone-seta"></i>
            </div>
            <a href="calendario.html" class="btn-dourado">Ir para Agenda</a>
        </section>
    </main>

    <footer class="rodape">
        <div class="rodape-container">
            <div class="rodape-info">
                <span><strong>Créditos</strong></span>
                <span>Kauã V. Reis</span>
                <span>Beatriz Rios</span>
                <span>João Pedro G. Pereira</span>
                <span>Gideão dos Santos</span>
            </div>
            <div class="rodape-copyright">
                © 2025 Grêmio Colorado - Todos os direitos reservados
            </div>
            <div class="rodape-social">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-discord"></i></a>
            </div>
        </div>
    </footer>

    <!-- container das modais -->
    <div id="modal-container"></div>

</body>

</html>