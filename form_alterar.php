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
    <div class="agenda" border="3" style="background-color:#FFEAA7;">
        <h2>Agenda Telefonica Completa</h2>

        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET["id"];
            require_once("conexao.php");
            $conexao = conectadb();
            $conexao->set_charset("utf8");

            // Prepare the SQL statement
            $sql = "SELECT * FROM agenda_telefonica WHERE id=?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id); // Bind the parameter

            // Execute the statement and check for success
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($linha = $result->fetch_assoc()) {
                        $nome = $linha["primeiro_nome"];
                        $sobrenome = $linha["sobrenome"];
                        $email = $linha["email"];
                        $telefone = $linha["telefone"];

                        ?>
                        <form action="alterar.php" method="POST">
                            <table align="center">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <tr>
                                    <td align="right">
                                        <label>
                                            * Nome:
                                        </label>
                                    </td>
                                    <td>
                                        <input type="text" name="nome" value="<?= $nome ?>" placeholder="Qual seu nome?">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <label>
                                            * Sobrenome:
                                        </label>
                                    </td>
                                    <td>
                                        <input type="text" name="sobrenome" value="<?= $sobrenome ?>" placeholder="Qual seu sobre-nome?">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <label>
                                            * Email:
                                        </label>
                                    </td>
                                    <td>
                                        <input type="email" name="email" value="<?= $email ?>" placeholder="Qual seu email?">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <label>
                                            * Telefone:
                                        </label>
                                    </td>
                                    <td>
                                        <input type="text" name="telefone" value="<?= $telefone ?>" placeholder="Qual seu telefone?"
                                            maxlenght="14" onkeydown="javascript::fMasc(this,mTel);">
                                    </td>
                                </tr>

                            </table>
                            <button type="submit">Alterar</button>
                        </form>

                        <?php
                    }
                } else {
                    echo "<tr> Sem Resultados</tr>";
                }
                $stmt->close(); // Close the statement
            } else {
                echo "Erro ao executar a query: " . $stmt->error;
            }

            $conexao->close(); // Close the connection