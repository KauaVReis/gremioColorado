<?php
// 1. Inclui o ficheiro de conexão com o banco de dados
require_once 'conectar.php';

// --- LÓGICA DE UPLOAD DA FOTO ---

$caminhoFoto = null; // Inicia a variável do caminho da foto como nula

// Verifica se um ficheiro foi enviado e se não houve erros
if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] == 0) {

    $diretorioUpload = '../_imagens/perfil/';

    // Cria o diretório se ele não existir
    if (!is_dir($diretorioUpload)) {
        mkdir($diretorioUpload, 0777, true);
    }

    $nomeArquivo = basename($_FILES['fotoPerfil']['name']);
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    $nomeUnico = uniqid() . '.' . $extensao;
    $caminhoCompleto = $diretorioUpload . $nomeUnico;

    $tiposPermitidos = ['jpg', 'jpeg', 'png'];

    if (!in_array($extensao, $tiposPermitidos)) {
        echo json_encode(['status' => 'error', 'message' => 'Erro: Tipo de ficheiro não permitido (apenas JPG, JPEG, PNG).']);
        exit;
    }

    // Move o ficheiro do local temporário para o destino final
    if (move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $caminhoCompleto)) {
        // Se o upload for bem-sucedido, guarda o caminho relativo para o banco de dados
        $caminhoFoto = '_imagens/perfil/' . $nomeUnico;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao mover o ficheiro.']);
        exit;
    }
}

// --- FIM DA LÓGICA DE UPLOAD ---


// 2. Recebe os dados do formulário via POST
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$idade = $_POST['idade'] ? (int) $_POST['idade'] : null; // Converte para inteiro ou nulo
$turma = $_POST['turma'] ?? '';
$esporte = $_POST['esporte'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$senha = $_POST['senha'] ?? '';
$novidades = isset($_POST['novidades']) && $_POST['novidades'] === 'sim' ? 1 : 0;

// 3. Validação do lado do servidor
if (empty($nome) || empty($email) || empty($senha) || empty($turma) || empty($esporte)) {
    echo json_encode(['status' => 'error', 'message' => 'Por favor, preencha todos os campos obrigatórios.']);
    exit;
}

// 4. Criptografia da senha
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

// 5. Inserção no banco de dados com a coluna da foto
$sql = "INSERT INTO usuario (nome, email, telefone, idade, turma, esporte, cpf, senha, localFoto, novidades) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    // Associa os parâmetros (bind)
    // s = string, i = integer. A ordem deve corresponder à query SQL.
    mysqli_stmt_bind_param($stmt, "sssisssssi", $nome, $email, $telefone, $idade, $turma, $esporte, $cpf, $senhaHash, $caminhoFoto, $novidades);

    // Executa a consulta
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'success', 'message' => 'Cadastro realizado com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao cadastrar. O email ou CPF já pode estar em uso.']);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro interno no servidor. Por favor, tente mais tarde.']);
}

mysqli_close($conexao);
?>