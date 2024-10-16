<?php
require_once('conexao.php');
$conexao = conectadb();

// Prepare the SQL statement
$stmt = $conexao->prepare("SELECT * FROM usuarios WHERE user = ?");
$stmt->bind_param("s", $_POST['usuario']);

// Execute and check for success
if (!$stmt->execute()) {
    header('Location: index.php?msg=2'); // Database error
    exit();
}

// Get the result
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    $linha = $result->fetch_assoc();
    // Verify the password
    if (password_verify($_POST['senha'], $linha['senha'])) {
        // Start a session and store user data
        session_start();
        $_SESSION['usuario'] = $linha['user'];
        header('Location: menu.php');
        exit();
    } else {
        header('Location: index.php?msg=1'); // Invalid password
        exit();
    }
} else {
    header('Location: index.php?msg=1'); // User not found
    exit();
}

$stmt->close();
$conexao->close();

$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$stmt = $conexao->prepare("INSERT INTO usuarios (user, senha) VALUES (?, ?)");
$stmt->bind_param("ss", $_POST['usuario'], $senha);
?>