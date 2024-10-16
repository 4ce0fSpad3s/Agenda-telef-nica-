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
    <div class="agenda">
        <h2>Exclusão de Registros</h2>

        <?php
        require_once("conexao.php");
        $conexao = conectadb();
        $conexao->set_charset("utf8");

        // Check if 'id' is set and is numeric
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];

            // Prepare the SQL statement
            $sql = "DELETE FROM agenda_telefonica WHERE id=?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id); // Bind the parameter

            // Execute the statement and check for success
            if ($stmt->execute()) {
                echo "Registro EXCLUIDO com sucesso!";
            } else {
                echo "Erro ao excluir registro: " . $stmt->error;
            }

            $stmt->close(); // Close the statement
        } else {
            echo "ID inválido.";
        }

        $conexao->close(); // Close the connection
        ?>
    </div>

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
                            <center align="right">
                                <input type="submit" value="Listar Agenda Telefone">
                            </center>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="mostrar_nome.php">
                            <center align="left">
                                <input type="submit" value="Consultar Nome">
                            </center>
                        </form>
                    </td>
                </tr>
            </table>
        </div>

        <hr width="100%" align="center" size="3" color="blue">
        <div id="container">
            <table align="center">
                <tr>
                    <td>
                        <form method="POST" action="menu.php">
                            <center align="right">
                                <input type="submit" value="Home">
                            </center>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="alterar_contato.php">
                            <center align="right">
                                <input type="submit" value="Alterar Contato">
                            </center>
                        </form>
                    </td>