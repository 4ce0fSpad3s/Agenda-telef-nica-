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
        <hr width="100%" align="center" size="3" color="blue">
        <h2>Agenda Telefonica em Ordem Alfabética:</h2>
    </header>

    <main>
        <table class="tabela" align="center" border="1">
            <tr>
                <th class="elemento1">Nome</th>
                <th class="elemento2">Telefone</th>
            </tr>

            <?php
            require_once("conexao.php");
            $conexao = conectadb();
            $conexao->set_charset("utf8");
            $sql = "SELECT primeiro_nome, telefone FROM agenda_telefonica ORDER BY primeiro_nome ASC";

            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while ($linha = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($linha["primeiro_nome"]) . "</td>";
                    echo "<td>" . htmlspecialchars($linha["telefone"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Não há resultados.</td></tr>";
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
                        </td>

                        <td>
                            <form method="POST" action="mostrar_nome.php">
                                <center>
                                    <input type="submit" value="Listar Nome">
                                </center>
                            </form>
                        </td>

                        <td>
                            <form method="POST" action="mostrar_nome_sobrenome.php">
                                <center>
                                    <input type="submit" value="Listar Nome e Sobrenome">
                                </center>
                            </form>
                        </td>

                        <td>
                            <form method="POST" action="listar_agenda_completa.php">
                                <center>
                                    <input type="submit" value="Listar Agenda Telefone">
                                </center>
                            </form>
                        </td>

                        <td>
                            <form method="POST" action="mostrar_nome.php">
                                <center>
                                    <input type="submit" value="Consultar Nome">
                                </center>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <hr width="100%" align="center" size="3" color="blue">
            <div id="container">
               