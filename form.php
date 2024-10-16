<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="css/agenda.css" />
    <script type="text/javascript" src="js/formulario.js"></script>
</head>

<body>

    <div id="autor">
        <h1 id="h1" style="text-align: center;">ESCREVA SEU NOME AQUI</h1>
    </div>

    <hr width="100%" style="margin: auto;" size="3" color="black">

    <div id="container">
        <h2>Cadastrar Dados na Agenda</h2>
        <form align="center" action="insere.php" method="POST">
            <div class="formulario">
                <table>
                    <tr>
                        <td align="right">
                            <label>ID:</label>
                        </td>
                        <td>
                            <input class="elemento" type="text" name="id" required>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            <label>Primeiro Nome:</label>
                        </td>
                        <td>
                            <input class="elemento" type="text" name="primeiro_nome" required>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            <label>Sobre-Nome:</label>
                        </td>
                        <td>
                            <input class="elemento" type="text" name="sobrenome" required>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            <label>Email:</label>
                        </td>
                        <td>
                            <input class="elemento" type="text" name="email" required>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">
                            <label>Telefone:</label>
                        </td>
                        <td>
                            <input class="elemento" type="tel" name="telefone" placeholder="Qual o seu telefone?"
                                maxlength="14" onkeydown="javascript:fMasc(this,mTel);" required>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <div id="container">
                <table>
                    <tr>
                        <td>
                            <input type="submit" value="Salvar">
                        </td>
                        <td>
                            <form method="POST" action="mostrar_nome.php">
                                <input type="submit" value="Consultar">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="procura_deletar.php">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="alterar_contato.php">
                                <input type="submit" value="Alterar">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </form>

        <hr width="100%" style="margin: auto;" size="3" color="black">

        <div id="container">
            <table align="center">
                <tr>
                    <td>
                        <form method="POST" action="menu.php">
                            <input type="submit" value="Home">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <h4>
        <center>Senai Norte - Joinvile - SC</center>
    </h4>

</body>

</html>