<?php require_once '_php/verifica_login.php';
$fotoPerfil = $_SESSION['usuario_localFoto'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria - Grêmio Colorado</title>
    <link rel="stylesheet" href="_css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c707ea077b.js" crossorigin="anonymous"></script>
</head>
<style>
    .modal {
        display: none;
        /* Oculto por padrão */
        position: fixed;
        /* Fixado na tela */
        z-index: 1;
        /* Sobre outros elementos */
        padding-top: 100px;
        /* Localização da janela */
        left: 0;
        top: 0;
        width: 100%;
        /* Largura total */
        height: 100%;
        /* Altura total */
        overflow: auto;
        /* Habilita scroll se a imagem for muito grande */
        background-color: rgb(0, 0, 0);
        /* Cor de fundo */
        background-color: rgba(0, 0, 0, 0.9);
        /* Cor de fundo com opacidade */
    }

    /* Conteúdo do modal */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* A legenda da imagem do modal */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }
</style>

<body>

    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="navbar-logo">
                <img src="_imagens/gremioColoradoLogo.png" alt="Logo Grêmio Colorado">
            </a>
            <ul class="navbar-menu">
                <li><a href="index.php">Início</a></li>
                <li><a href="galeria.php" class="active">Galeria</a></li>
                <li><a href="calendario.php">Agenda</a></li>
            </ul>
            <div class="navbar-user-area">
                <span class="welcome-message">Bem-vindo,
                    <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</span>
                    <img src="<?php echo htmlspecialchars($fotoPerfil); ?>" alt="Foto de Perfil" class="profile-pic">
                <a href="_php/logout.php" class="logout-link">Sair</a>
            </div>
        </div>
    </nav>

    <main class="main-container main-container-galeria">
        <div class="gallery-header">
            <p>Veja os destaques dos últimos eventos. Use as setas para navegar.</p>
        </div>

        <!-- Estrutura do Carrossel -->
        <div class="carrossel-container">
            <button class="carrossel-botao botao-anterior" id="botaoAnterior">&#10094;</button>
            <div class="carrossel-galeria">
                <ul class="carrossel-trilho">
                    <!-- Slide/Página 1 -->
                    <li class="carrossel-slide">
                        <div class="galeria-grid-slide">
                            <img src="_imagens/imagem (1).png" alt="Imagem da galeria 1" name="imagemGaleria[]">
                            <img src="_imagens/imagem (2).png" alt="Imagem da galeria 2" name="imagemGaleria[]">
                            <img src="_imagens/imagem (3).png" alt="Imagem da galeria 3" name="imagemGaleria[]">
                            <img src="_imagens/imagem (4).png" alt="Imagem da galeria 4" name="imagemGaleria[]">
                            <img src="_imagens/imagem (5).png" alt="Imagem da galeria 5" name="imagemGaleria[]">
                            <img src="_imagens/imagem (6).png" alt="Imagem da galeria 6" name="imagemGaleria[]">
                            <img src="_imagens/imagem (7).png" alt="Imagem da galeria 7" name="imagemGaleria[]">
                            <img src="_imagens/imagem (8).png" alt="Imagem da galeria 8" name="imagemGaleria[]">
                            <img src="_imagens/imagem (9).png" alt="Imagem da galeria 9" name="imagemGaleria[]">
                            <img src="_imagens/imagem (10).png" alt="Imagem da galeria 10" name="imagemGaleria[]">
                        </div>
                    </li>
                    <!-- Slide/Página 2 -->
                    <li class="carrossel-slide">
                        <div class="galeria-grid-slide">
                            <img src="_imagens/imagem (11).png" alt="Imagem da galeria 11" name="imagemGaleria[]">
                            <img src="_imagens/imagem (12).png" alt="Imagem da galeria 12" name="imagemGaleria[]">
                            <img src="_imagens/imagem (13).png" alt="Imagem da galeria 13" name="imagemGaleria[]">
                            <img src="_imagens/imagem (14).png" alt="Imagem da galeria 14" name="imagemGaleria[]">
                            <img src="_imagens/imagem (15).png" alt="Imagem da galeria 15" name="imagemGaleria[]">
                            <img src="_imagens/imagem (16).png" alt="Imagem da galeria 16" name="imagemGaleria[]">
                            <img src="_imagens/imagem (17).png" alt="Imagem da galeria 17" name="imagemGaleria[]">
                            <img src="_imagens/imagem (18).png" alt="Imagem da galeria 18" name="imagemGaleria[]">
                            <img src="_imagens/imagem (19).png" alt="Imagem da galeria 19" name="imagemGaleria[]">
                            <img src="_imagens/imagem (20).png" alt="Imagem da galeria 20" name="imagemGaleria[]">
                        </div>
                    </li>
                </ul>
            </div>
            <button class="carrossel-botao botao-proximo" id="botaoProximo">&#10095;</button>
        </div>
    </main>

    <footer class="rodape">
        <div class="rodape-container">
            <div class="rodape-info">
                <span><strong>Créditos</strong></span>
                <span>Kauã V. Reis</span>
                <span>João Pedro G. Pereira</span>
                <span>João Victor D. Santos</span>
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

    <!-- Container onde os modais serão carregados -->
    <div id="modal-container"></div>
    <div id="meuModal" class="modal">
        <span id="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption" class="caption"></div>
    </div>
    <script src="_js/script.js" defer></script>

</body>

<script>


    addEventListener('keydown', function (event) {
        if (event.key === "ArrowRight") { // Verifica se a tecla pressionada é "ArrowRight"
            document.getElementById("botaoProximo").click(); // Simula o clique no botão "Próximo"
        }
    });

    addEventListener('keydown', function (event) {
        if (event.key === "ArrowLeft") { // Verifica se a tecla pressionada é "ArrowLeft"
            document.getElementById("botaoAnterior").click(); // Simula o clique no botão "Anterior"
        }
    });

    var modal = document.getElementById("meuModal");

    // Obter a imagem que abre o modal e a imagem dentro do modal
    var img = document.querySelectorAll('img[name="imagemGaleria[]"]');
    var modalImg = document.getElementById("img01");
    var botaoCarrosel = document.querySelectorAll('.carrossel-botao');
    var modalCaption = document.getElementById('caption');

    // Quando o usuário clicar na imagem, abra o modal
    img.forEach(function (image) {
        image.onclick = function () {
            modal.style.display = 'block'; // Exibe o modal
            modalImg.src = this.src; // Define o src da imagem do modal para o da imagem clicada
            modalCaption.innerHTML = this.alt; // Define o texto da legenda com o alt da imagem
            botaoCarrosel.forEach(function (botao) {
                botao.style.display = 'none'; // Oculta os botões do carrossel
            });
        }
    });

    // Obter o botão de fechar (o 'x')
    var span = document.getElementById("close");

    // Quando o usuário clicar no botão 'x', feche o modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // Opcional: Fechar o modal ao clicar em qualquer lugar fora da imagem
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            botaoCarrosel.forEach(function (botao) {
                botao.style.display = 'block'; // Exibe os botões do carrossel
            });
        }
    }

    addEventListener('keydown', function (event) {
        if (event.key === "Escape") { // Verifica se a tecla pressionada é "Escape"
            modal.style.display = "none"; // Fecha o modal
            botaoCarrosel.forEach(function (botao) {
                botao.style.display = 'block'; // Exibe os botões do carrossel
            });
        }
    });

</script>

</html>