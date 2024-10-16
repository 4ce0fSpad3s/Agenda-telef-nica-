<?php
require_once("conexao.php");
$conexao = conectadb(); // Establish the connection

/*
ESSE ARQUIVO É RESPONSÁVEL POR REALIZAR A CONEXÃO COM O BANCO DE DADOS
*/

$nomeservidor = "SERVIDOR"; // Substitua por seu servidor de banco de dados
$usuario = "USUARIO"; // Substitua pelo seu nome de usuário
$senha = "SENHA"; // Substitua pela sua senha
$bancodedados = "agenda_telefonica"; // Nome do banco de dados

// Função para criar a conexão
function conectadb() {
    global $nomeservidor, $usuario, $senha, $bancodedados; // Usar variáveis globais

    // Usar mysqli_report para gerenciar erros
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        // Criar a conexão
        $conn = new mysqli($nomeservidor, $usuario, $senha, $bancodedados);
        $conn->set_charset("utf8"); // Definir o conjunto de caracteres
        return $conn; // Retornar a conexão
    } catch (mysqli_sql_exception $e) {
        // Captura e exibe a mensagem de erro
        echo "Erro de conexão: " . $e->getMessage();
        exit; // Termina o script
    }
}
?>