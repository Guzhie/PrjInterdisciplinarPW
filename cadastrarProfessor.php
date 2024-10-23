<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Professor</title>
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
        exit();
    }
    ?>
    <form name="cliente" method="POST" action="">

        <fieldset id="a">
            <legend><b>Dados do Professor</b></legend>
            <p>Nome: <input name="txtnome" type="text" size="40" maxlength="40" placeholder="Nome do Professor"></p>
            <p>Cpf: <input name="txtcpf" type="text" size="10" placeholder="Cpf do Professor"></p>
            <p>Data de Nascimento: <input name="txtdatanasc" type="date" size="40" maxlength="40" placeholder="Data de Nascimento"></p>
            <p>Endereço: <input name="txtendereco" type="text" size="10" placeholder="Endereço do Professor"></p>
            <p>Cep: <input name="txtcep" type="text" size="40" maxlength="40" placeholder="Cep do Professor"></p>
            <p>Telefone: <input name="txttelefone" type="text" size="10" placeholder="Telefone do Professor"></p>
            <p>Email: <input name="txtemail" type="text" size="40" maxlength="40" placeholder="Email do Professor"></p>
        </fieldset>
        <br>
        <fieldset id="b">
            <legend><b>Opções</b></legend>
            <br>
            <input name="btnenviar" type="submit" value="Cadastrar">
            <input name="limpar" type="submit" value="Limpar">

        </fieldset>
    </form>

    <?php
    extract($_POST, EXTR_OVERWRITE);
    if (isset($btnenviar)) {
        include_once 'Professor.php';
        $p = new Professor();
        $p->setNomeProf($txtnome);
        $p->setCpfProf($txtcpf);
        $p->setDataNascProf($txtdatanasc);
        $p->setEnderecoProf($txtendereco);
        $p->setCepProf($txtcep);
        $p->setTelefoneProf($txttelefone);
        $p->setEmailProf($txtemail);
        echo "<h3><br><br>" . $p->criar() . "</h3>";
    }
    ?>
    <br>
    <center>
        <button><a href="menu.html">Voltar</a></button>
    </center>
</body>

</html>