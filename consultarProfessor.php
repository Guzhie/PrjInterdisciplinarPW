<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Professor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
        }
        legend {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            margin-right: 10px;
        }
        input[type="text"],
        input[type="submit"],
        input[type="reset"] {
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="reset"] {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    ?>
    
    <div class="container">
        <h1>Consultar Professor</h1>
        <form name="cliente" method="POST" action="">
            <fieldset id="a">
                <legend>Informe o Nome do Professor Desejado</legend>
                <p>Nome: <input name="txtnome" type="text" size="40" maxlength="40" placeholder="Nome do Professor"></p>
                <div class="button-container">
                    <input name="btnenviar" type="submit" value="Consultar">
                    <input name="limpar" type="reset" value="Limpar">
                </div>
            </fieldset>
            <br>
            <fieldset id="B">
                <legend>Resultado</legend>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>CEP</th>
                        <th>Endereço</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                    </tr>
                    <?php
                    extract($_POST, EXTR_OVERWRITE);
                    if (isset($btnenviar)) {
                        include_once 'Professor.php';
                        $Professor = new Professor();
                        $Professor->setNomeProf($txtnome . '%');
                        $Professores = $Professor->consultar();
                        foreach ($Professores as $Professor) {
                            echo "<tr>";
                            echo "<td>" . $Professor['Id_Prof'] . "</td>";
                            echo "<td>" . $Professor['Nome_Prof'] . "</td>";
                            echo "<td>" . $Professor['DataNasc_Prof'] . "</td>";
                            echo "<td>" . $Professor['cep_prof'] . "</td>";
                            echo "<td>" . $Professor['endereco_prof'] . "</td>";
                            echo "<td>" . $Professor['cpf_Prof'] . "</td>";
                            echo "<td>" . $Professor['email_prof'] . "</td>";
                            echo "<td>" . $Professor['telefone_Prof'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </fieldset>
        </form>

        <div class="button-container">
            <a href="cadastrarProfessor.php">Cadastrar Professor</a>
            <a href="excluirProfessor.php">Excluir Professor</a>
            <a href="menu.php">Voltar ao Início</a>
        </div>
    </div
