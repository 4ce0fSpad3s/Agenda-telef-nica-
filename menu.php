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
        <h2>Agenda Telefonica</h2>
    </header>

    <main id="container">
        <table align="center">
            <tr>
                <td>
                    <form method="POST" action="form.php">
                        <center>
                            <input type="submit" value="Cadastrar Contato" />
                        </center>
                    </form>
                </td>

                <td>
                    <form method="POST" action="alterar_contato.php">
                        <center>
                            <input type="submit" value="Alterar Contato" />
                        </center>
                    </form>
                </td>

                <td>
                    <form method="POST" action="procura_deletar.php">
                        <center>
                            <input type="submit" value="Excluir Contato" />
                        </center>
                    </form>
                </td>
            </tr>

            <tr>
                <td>
                    <form method="GET" action="pesquisa_dinamica.php">
                        <center>
                            <input type="submit" value="Pesquisa Dinâmica" />
                        </center>
                    </form>
                </td>

                <td>
                    <form method="POST" action="mostrar_nome.php">
                        <center>
                            <input type="submit" value="Consultar Nome" />
                        </center>
                    </form>
                </td>

                <td>
                    <form method="POST" action="listar_agenda_completa.php">
                        <center>
                            <input type="submit" value="Consultar Agenda" />
                        </center>
                    </form>
                </td>
            </tr>
        </table>
    </main>

    <footer>
        <h4>
            <center>Senai Norte - Joinvile - SC</center>
        </h4>
    </footer>
</body>

</html>