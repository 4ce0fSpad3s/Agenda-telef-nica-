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
    <hr width="100%" align="center" color="blue" size="3">
    <div class="agenda" style="background-color:#FFEAA7;">
        <h2>Agenda Telefonica Completa</h2>
        
        <form method="GET" action="listar_agenda_completa.php">
            <p align="center">Pesquisa: <input type="text" name="nome" /></p>
            <p align="center"><input type="submit" value="Buscar"></p>
        </form>

        <center>
            <table>
                <tr>
                    <th style="background-color:#FDCB6E">ID</th>
                    <th style="background-color:#FDCB6E">Primeiro Nome</th>
                    <th style="background-color:#FDCB6E">Sobre-Nome</th>
                    <th style="background-color:#FDCB6E">Email</th>
                    <th style="background-color:#FDCB6E">Telefone</th>
                </tr>

                <?php
                // Database connection
                $conexao = new mysqli("127.0.0.1", "root", "", "agenda_telefonica");
                if ($conexao->connect_errno) {
                    echo "<tr><td colspan='5'>Ocorreu um erro de conexão com o Banco de Dados</td></tr>";
                    exit;
                }
                $conexao->set_charset("utf8");

                $pesquisa = isset($_GET['nome']) ? $_GET['nome'] : '';
                $stmt = $conexao->prepare("SELECT * FROM agenda_telefonica WHERE primeiro_nome LIKE ?");
                $likePesquisa = "%" . $pesquisa . "%";
                $stmt->bind_param("s", $likePesquisa);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($linha = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($linha["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($linha["primeiro_nome"]) . "</td>";
                        echo "<td>" . htmlspecialchars($linha["sobrenome"]) . "</td>";
                        echo "<td>" . htmlspecialchars($linha["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($linha["telefone"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'><center>Sem resultados!</center></td></tr>";
                }
                $stmt->close();
                $conexao->close();
                ?>
            </table>
        </center>

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