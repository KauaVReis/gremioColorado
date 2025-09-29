<?php
// Protege a página, verificando o login e o nível de acesso
require_once 'verifica_login.php';
if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 1) {
    header("Location: index.php");
    exit();
}

// Inclui a conexão com o banco de dados
require_once 'conectar.php';

// Query para buscar todos os usuários, exceto a senha
$sql = "SELECT id, nome, email, telefone, idade, turma, esporte, cpf, nivel, data_cadastro, localFoto FROM usuario ORDER BY nome ASC";
$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários - Admin</title>
    <link rel="stylesheet" href="../_css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <main class="main-container">
        <div class="admin-header">
            <h1 class="titulo-secao">Lista de Usuários Cadastrados</h1>
            <a href="admin.php" class="btn-dourado">Voltar ao Painel</a>
        </div>

        <div class="tabela-container">
            <table class="tabela-usuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Idade</th>
                        <th>Turma</th>
                        <th>CPF</th>
                        <th>Nível</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($resultado) > 0) { ?>
                        <?php while ($usuario = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?php echo $usuario['id']; ?></td>
                                <td>
                                    <?php if (!empty($usuario['localFoto'])): ?>
                                        <img src="../<?php echo htmlspecialchars($usuario['localFoto']); ?>"
                                            alt="Foto de <?php echo htmlspecialchars($usuario['nome']); ?>"
                                            class="tabela-foto-perfil">
                                    <?php else: ?>
                                        <span>Sem foto</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['telefone']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['idade']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['turma']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['cpf']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['nivel']); ?></td>
                            </tr>
                        <?php }
                        ; ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="9">Nenhum usuário encontrado.</td>
                        </tr>
                    <?php }
                    ; ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>
<?php
// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>