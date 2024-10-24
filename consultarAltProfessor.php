<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Professor</title>
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

        .button-grid {
            margin-top: 20px;
        }

        .button-grid input[type="submit"],
        .button-grid input[type="reset"] {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 8px;
            width: calc(100% - 20px);
            box-sizing: border-box;
        }

        .button-grid input[type="submit"]:hover,
        .button-grid input[type="reset"]:hover {
            background-color: #0056b3;
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
    
    <h1>Alteração de Professores Cadastrados</h1>
    <form name="cliente" method="POST" action="alterarProfessor.php">
        <fieldset id="a">
            <legend>Informe o Código do Professor</legend>
            <p>Código: <input name="txtcod" type="text" size="40" maxlength="40" placeholder="Código do Professor"></p>
        </fieldset>
        <div class="button-grid">
            <input name="btnenviar" type="submit" value="Alterar">
            <input name="limpar" type="reset" value="Limpar">
            <input type="submit" name="voltar" value="Voltar ao Início" formaction="menu.php">
            <input type="submit" name="voltar" value="Consultar" formaction="consultarProfessor.php">
        </div>
    </form>
</body>

</html>
