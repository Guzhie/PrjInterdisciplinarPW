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

        legend, h2 {
            font-weight: bold;
        }

        .mensagem {
            color: green;
        }

        input[type="text"],
        input[type="date"] {
            padding: 8px;
            width: calc(100% - 20px);
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .button-group {
            margin-top: 20px;
        }

        .button-group input[type="submit"] {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .button-group input[type="submit"]:hover {
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

    include_once 'Professor.php';
    $mensagem = '';
    $pro_bd = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $txtcod = $_POST['txtcod'];
        $p = new Professor();
        $p->setIdProf($txtcod);

        if (isset($_POST['btnAlterar'])) {
            $p->setNomeProf($_POST['txtnome']);
            $p->setDataNascProf($_POST['txtnasci']);
            $p->setCepProf($_POST['txtcep']);
            $p->setEnderecoProf($_POST['txtende']);
            $p->setCpfProf($_POST['txtcpf']);
            $p->setEmailProf($_POST['txtemail']);
            $p->setTelefoneProf($_POST['txttel']);
            $resultado = $p->alterar2();
            $mensagem = $resultado;

            $pro_bd = $p->alterar();
        } else {
            $pro_bd = $p->alterar();
        }
    }
    ?>

    <fieldset>
        <h2>Alterar Professor</h2>

        <?php if (!empty($mensagem)) { ?>
            <p class="mensagem"><?php echo $mensagem; ?></p>
        <?php } ?>

        <form name="cliente2" action="" method="post">
            <?php if (!empty($pro_bd)) {
                foreach ($pro_bd as $pro_mostrar) { ?>
                    <input type="hidden" name="txtcod" value="<?php echo $pro_mostrar[4]; ?>">
                    <b>Código: <?php echo $pro_mostrar[4]; ?></b>
                    <br><br><b>Nome: </b>
                    <input type="text" name="txtnome" value="<?php echo $pro_mostrar[0]; ?>">
                    <br><br><b>Data de Nascimento: </b>
                    <input type="date" name="txtnasci" value="<?php echo $pro_mostrar[1]; ?>">
                    <br><br><b>CEP: </b>
                    <input type="text" name="txtcep" value="<?php echo $pro_mostrar[2]; ?>">
                    <br><br><b>Endereço: </b>
                    <input type="text" name="txtende" value="<?php echo $pro_mostrar[3]; ?>">
                    <br><br><b>CPF: </b>
                    <input type="text" name="txtcpf" value="<?php echo $pro_mostrar[5]; ?>">
                    <br><br><b>Email: </b>
                    <input type="text" name="txtemail" value="<?php echo $pro_mostrar[6]; ?>">
                    <br><br><b>Telefone: </b>
                    <input type="text" name="txttel" value="<?php echo $pro_mostrar[7]; ?>">
                    <br><br>

                    <div class="button-group">
                        <input type="submit" value="Alterar" name="btnAlterar">
                        <input type="submit" value="Voltar" name="btnVoltar" formaction="consultarAltProfessor.php">
                    </div>
            <?php }
            } ?>
        </form>
    </fieldset>
</body>

</html>
