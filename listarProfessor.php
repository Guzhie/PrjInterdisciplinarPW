<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professores Cadastrados</title>
    <style>
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    ?>
    
    <div class="container">
        <h1>Relação de Professores Cadastrados</h1>

        <?php
        include_once 'Professor.php';
        $Professor = new Professor();
        $Professores = $Professor->listar();
        ?>

        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Nascimento</th>
                <th>Cep</th>
                <th>Endereço</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
            </tr>
            <?php
            // Listagem dos professores
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
            ?>
        </table>

        <div class="button-container">
            <a href="cadastrarProfessor.php">Cadastrar Professor</a>
            <a href="excluirProfessor.php">Excluir Professor</a>
            <a href="menu.php">Voltar</a>
        </div>
    </div>
</body>
</html>
