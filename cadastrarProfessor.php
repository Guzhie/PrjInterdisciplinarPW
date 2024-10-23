<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Professor</title>
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

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        p {
            margin: 0;
        }

        button {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    // Redireciona se o usuário não estiver logado
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    ?>

    <form name="cliente" method="POST" action="">
        <fieldset id="a">
            <legend>Dados do Professor</legend>
            <div class="form-grid">
                <p>
                    Nome: <input name="txtnome" type="text" maxlength="40" placeholder="Nome do Professor" required>
                </p>
                <p>
                    Cpf: <input name="txtcpf" type="text" placeholder="Cpf do Professor" required>
                </p>
                <p>
                    Data de Nascimento: <input name="txtdatanasc" type="date" required>
                </p>
                <p>
                    Endereço: <input name="txtendereco" type="text" placeholder="Endereço do Professor" required>
                </p>
                <p>
                    Cep: <input name="txtcep" type="text" placeholder="Cep do Professor" required>
                </p>
                <p>
                    Telefone: <input name="txttelefone" type="text" placeholder="Telefone do Professor" required>
                </p>
                <p>
                    Email: <input name="txtemail" type="email" maxlength="40" placeholder="Email do Professor" required>
                </p>
            </div>
        </fieldset>

        <fieldset id="b">
            <legend>Opções</legend>
            <input name="btnenviar" type="submit" value="Cadastrar">
            <input name="limpar" type="reset" value="Limpar">
        </fieldset>
    </form>

    <?php
    // Processa a submissão do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnenviar'])) {
        include_once 'Professor.php';
        $p = new Professor();
        $p->setNomeProf($_POST['txtnome']);
        $p->setCpfProf($_POST['txtcpf']);
        $p->setDataNascProf($_POST['txtdatanasc']);
        $p->setEnderecoProf($_POST['txtendereco']);
        $p->setCepProf($_POST['txtcep']);
        $p->setTelefoneProf($_POST['txttelefone']);
        $p->setEmailProf($_POST['txtemail']);
        echo "<h3>" . $p->criar() . "</h3>";
    }
    ?>

    <center>
        <button><a href="menu.html">Voltar</a></button>
    </center>
</body>

</html>
