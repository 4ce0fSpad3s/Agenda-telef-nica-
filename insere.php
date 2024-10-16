<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica SENAI Norte</title>
    <link rel="stylesheet" href="css/agenda.css" />
</head>

<body>
    <h1>
        <center>ESCREVA SEU NOME AQUI</center>
    </h1>
    <div class="agenda">
        <h2>Dados Cadastrados com Sucesso!</h2>

        <?php
        // VALIDANDO A EXISTÊNCIA DOS DADOS
        $erro = "";
        $sucesso = "";

        if (isset($_POST["id"], $_POST["primeiro_nome"], $_POST["sobrenome"], $_POST["email"], $_POST["telefone"])) {
            // Validate required fields
            if (empty($_POST["id"]) || empty($_POST["primeiro_nome"]) || empty($_POST["sobrenome"]) || empty($_POST["telefone"])) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                // Database connection
                $conexao = new mysqli("127.0.1.1", "root", "", "agenda_telefonica");
                if ($conexao->connect_errno) {
                    echo "Ocorreu um erro na conexão com o Banco de Dados...";
                    exit;
                }

                // Prepare the SQL statement
                $id = $_POST["id"];
                $primeiro_nome = $_POST["primeiro_nome"];
                $sobrenome = $_POST["sobrenome"];
                $email = $_POST["email"];
                $telefone = $_POST["telefone"];

                $stmt = $conexao->prepare("INSERT INTO `agenda_telefonica` (`id`,`primeiro_nome`,`sobrenome`,`email`,`telefone`) VALUES (?,?,?,?,?)");
                $stmt->bind_param('sssss', $id, $primeiro_nome, $sobrenome, $email, $telefone);

                // Execute and check for success
                if (!$stmt->execute()) {
                    $erro = $stmt->error;
                } else {
                    $sucesso = "Dados cadastrados com sucesso!";
                }

                $stmt->close(); // Close the statement
                $conexao->close(); // Close the connection
            }
        }

        // Display error or success messages
        if (!empty($erro)) {
            echo '<div style="color:#F00">' . $erro . '</div><br/>';
        }
        if (!empty($sucesso)) {
            echo '<div style="color:#00F">' . $sucesso . '</div><br/>';
        }
        ?>

        <hr width="100%" align="center" size="3" color="blue">
        <div class="agenda1">
            <hr width="100%" align="center" size="3" color="blue">

            <div id="container">
                <table align="center">
                    <tr>
                        <td>
                            <form method="POST" action="form.php">
                                <center align="right">
                                    <input type="submit" value="Novo Cadastro">
                                </center>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="mostrar_nome.php">
                                <center align="left">
                                    <input type="submit" value="Listar Nome">
                                </center>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="mostrar_nome_sobrenome.php">
                                <center align="left">
                                    <input type="submit" value="Listar Nome e Sobrenome">
                                </center>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="listar_agenda_completa.php">