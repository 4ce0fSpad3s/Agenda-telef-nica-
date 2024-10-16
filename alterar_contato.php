<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica SENAI Norte</title>
    <link rel="stylesheet" href="css/agenda.css" />
    <style>
        .center {
            text-align: center;
        }
        hr {
            border: 3px solid blue; /* Use CSS for styling */
        }
    </style>
</head>

<body>
    <h1 class="center">ESCREVA SEU NOME AQUI</h1>
    <div class="agenda">
        <h2>Dados Cadastrados com Sucesso!</h2>

        <?php
        // VALIDANDO A EXISTÊNCIA DOS DADOS
        $erro = "";
        if (isset($_POST["id"], $_POST["primeiro_nome"], $_POST["sobrenome"], $_POST["email"], $_POST["telefone"])) {
            if (empty($_POST["id"])) {
                $erro = "Campo Obrigatório!";
            } elseif (empty($_POST["primeiro_nome"])) {
                $erro = "Campo Obrigatório!";
            } elseif (empty($_POST["sobrenome"])) {
                $erro = "Campo Obrigatório!";
            } elseif (empty($_POST["telefone"])) {
                $erro = "Campo Obrigatório!";
            } else {
                try {
                    $conexao = new mysqli("127.0.0.1", "root", "", "agenda_telefonica");
                    if ($conexao->connect_errno) {
                        throw new Exception("Ocorreu um erro na conexão com o Banco de Dados...");
                    }
                    // CADASTRO DOS DADOS ENVIADOS
                    $id = $_POST["id"];
                    $primeiro_nome = $_POST["primeiro_nome"];
                    $sobrenome = $_POST["sobrenome"];
                    $email = $_POST["email"];
                    $telefone = $_POST["telefone"];
                    $stmt = $conexao->prepare("INSERT INTO `agenda_telefonica` (`id`, `primeiro_nome`, `sobrenome`, `email`, `telefone`) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param('sssss', $id, $primeiro_nome, $sobrenome, $email, $telefone);

                    if (!$stmt->execute()) {
                        throw new Exception($stmt->error);
                    } else {
                        echo '<h1>Inserindo um valor</h1>';
                        echo '<font size="3" face="Arial"><center>Dados Cadastrados com Sucesso!</center></font>';
                    }
                } catch (Exception $e) {
                    $erro = $e->getMessage();
                }
            }

            if ($erro) {
                echo '<div style="color:#F00">' . $erro . '</div><br/><br/>';
            }
        }
        ?>

        <hr>
        <div class="agenda1">
            <hr>
            <div id="container">
                <table align="center">
                    <tr>
                        <td>
                            <form method="POST" action="form.php">
                                <input type="submit" value="Novo Cadastro">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="mostrar_nome.php">
                                <input type="submit" value="Listar Nome">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="mostrar_nome_sobrenome.php">
                                <input type="submit" value="Listar Nome e Sobrenome">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="listar_agenda_completa.php">
                                <input type="submit" value="Listar Agenda Telefone">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="mostrar_nome.php">
                                <input type="submit" value="Consultar Nome">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            <div id="container">
                <table align="center">
                    <tr>
                        <td>
                            <form method="POST" action="menu.php">
                                <input type="submit" value="Home">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="alterar_contato.php">
                                <input type="submit" value="Alterar Contato">
                            </form>