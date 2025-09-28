<?php
// Arquivo de conexão com o banco de dados MySQL

// 1. Definição das variáveis de conexão
$servidor = "localhost";    
$usuario = "root";          
$senha = "";                
$banco = "gremiocolorado";  

// A função mysqli_connect tenta ligar-se ao banco de dados com as credenciais fornecidas.
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Se a conexão falhar, o script é interrompido (die) e uma mensagem de erro é exibida.
// mysqli_connect_error() retorna a descrição do erro.
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Opcional: Definir o conjunto de caracteres para UTF-8 para evitar problemas com acentos
mysqli_set_charset($conexao, "utf8");

// Se o script chegar até aqui sem erros, a variável $conexao está pronta para ser usada
// nos outros ficheiros PHP para executar consultas SQL.
?>
