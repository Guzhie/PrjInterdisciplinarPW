<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Professor</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .button-container {
            margin-top: 10px;
        }
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
        .left-buttons, .right-button {
            margin-top: 20px;
        }
        .left-buttons {
            float: left;
        }
        .right-button {
            float: right;
        }
        .button {
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
        <h1>Excluir Professor</h1>
        <form name="cliente" method="POST" action="">
            <fieldset id="a">
                <legend>Informe o Código do Professor Desejado</legend>
                <p>
                    Código do Professor: 
                    <input name="txtid" type="text" size="40" maxlength="40" placeholder="ID do Professor">
                </p>
                <div class="button-container">
                    <input name="btnenviar" type="submit" value="Excluir"> 
                    <input name="limpar" type="reset" value="Limpar">
                </div>
            </fieldset>

            <fieldset id="B">
                <legend>Resultado</legend>
                <?php 
                if (isset($_POST['btnenviar'])) {
                    // Importa e cria a instância da classe Professor
                    include_once 'Professor.php';
                    $Professor = new Professor();
                    
                    // Define o ID do professor
                    $Professor->setIdProf($_POST['txtid'] . '%');
                    
                    // Exibe o resultado da exclusão
                    echo "<h3>" . $Professor->excluir() . "</h3>";
                }
                ?>
            </fieldset>
        </form>

        <div class="clearfix">
            <div class="left-buttons">
                <a href="cadastrarProfessor.php" class="button">Cadastrar Professor</a>
                <a href="ListarProfessor.php" class="button">Listar Professor</a>
            </div>
            <div class="right-button">
                <a href="menu.php" class="button">Voltar ao Início</a>
            </div>
        </div>
    </div>
</body>
</html>
