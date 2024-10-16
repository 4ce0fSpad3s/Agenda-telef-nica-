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
    <header>
        <h1>
            <center>ESCREVA SEU NOME AQUI</center>
        </h1>
        <hr width="100%" align="center" color="blue" size="3">
    </header>

    <main class="agenda">
        <h2>Deletar Registro</h2>

        <form method="POST">
            <label for="nome">Pesquisa</label>
            <input type="text" name="nome" id="nome">
            <input type="submit" value="Buscar">
        </form>

        <table class="tabela" align="center" border="1">
            <tr>
                <th>ID</th>
                <th>Primeiro Nome</th>
                <th>Sobre-Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>

            <?php
            require_once("conexao.php");
            $conexao = conectadb();
            $conexao->set_charset("utf8");

            $sql = "SELECT * FROM agenda_telefonica";
            if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                $nome = $_POST['nome'];
                // Use prepared statements to prevent SQL injection
                $sql = "SELECT * FROM agenda_telefonica WHERE primeiro_nome LIKE ?";
                $stmt = $conexao->prepare($sql);
                $searchTerm = "%" . $nome . "%";
                $stmt->bind_param("s", $searchTerm);
                $stmt->execute();
                $result = $stmt->get_result();
            } else {
                $result = $conexao->query($sql);
            }

            if ($result->num_rows > 0) {
                while ($linha = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($linha["id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($linha["primeiro_nome"]) . "</td>";
                    echo "<td>" . htmlspecialchars($linha["sobrenome"]) . "</td>";
                    echo "<td>" . htmlspecialchars($linha["email"]) . "</td>";
                    echo "<td>" . htmlspecialchars($linha["telefone"]) . "</td>";
                    echo "<td><a href='deletar.php?id=" . $linha["id"] . "' onclick='return confirm(\"Tem certeza que quer deletar o usuario?\")'>Deletar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Sem Resultado</td></tr>";
            }

            if (isset($stmt)) {
                $stmt->close();
            }
            $conexao->close();
            ?>
        </table>

        <hr width="100%" align="center" size="3" color="blue">
        <div class="agenda1">
            <hr width="100%" align="center" size="3" color="blue">
            <div id="container">
                <table align="center">
                    <tr>
                        <td>
                            <form method="POST" action="form.php">
                                <center>
                                    <input type="submit" value="Novo Cadastro">
                                </center>
                            </form>
                       