<?php
// Inicia a sessão. É essencial que esta linha esteja no topo de qualquer página que use sessões.
session_start();

// 1. Inclui o ficheiro de conexã
require_once 'conectar.php';

// 2. Recebe os dados do formulário de login via POST
$email = $_POST['login-email'] ?? '';
$senha = $_POST['login-senha'] ?? '';

// 3. Validação básica dos dados recebidos
if (empty($email) || empty($senha)) {
    echo json_encode(['status' => 'error', 'message' => 'Email e palavra-passe são obrigatórios.']);
    exit;
}

// 4. Procura o utilizador na base de dados pelo email
$sql = "SELECT id, nome, senha, localFoto, nivel FROM usuario WHERE email = ?";

$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    // 5. Verifica se o utilizador foi encontrado
    if (mysqli_num_rows($resultado) == 1) {
        $utilizador = mysqli_fetch_assoc($resultado);

        // 6. Verifica a palavra-passe
        // password_verify() compara a palavra-passe fornecida com a hash guardada na base de dados.
        if (password_verify($senha, $utilizador['senha'])) {
            // Palavra-passe correta! Login bem-sucedido.
            
            // 7. Guarda os dados do utilizador na sessão
            $_SESSION['usuario_id'] = $utilizador['id'];
            $_SESSION['usuario_nome'] = $utilizador['nome'];
            $_SESSION['usuario_localFoto'] = $utilizador['localFoto'];
            $_SESSION['nivel'] = $utilizador['nivel'];
            // Pode adicionar mais dados à sessão se precisar, como o nível de acesso.

            echo json_encode(['status' => 'success', 'message' => 'Login realizado com sucesso!']);
        } else {
            // Palavra-passe incorreta
            echo json_encode(['status' => 'error', 'message' => 'Palavra-passe incorreta.']);
        }
    } else {
        // Utilizador não encontrado
        echo json_encode(['status' => 'error', 'message' => 'Nenhum utilizador encontrado com este email.']);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro interno no servidor.']);
}

mysqli_close($conexao);
?>

