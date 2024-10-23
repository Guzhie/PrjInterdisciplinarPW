<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
        }
        p {
            margin: 15px 0;
            font-size: 16px;
            color: black;
        }        
    </style>
</head>

<body>
    <div class="container">
        <form name="cliente" action="" method="POST">
            <h1>Login</h1>
            <fieldset>
                <p>Usuário: <input name="txtUsuario" required type="text" placeholder="Digite seu usuário"></p>
                <p>Senha: <input name="txtSenha" required type="password" placeholder="Digite sua senha"></p>
            </fieldset>
            <div class="button-container">
                <input name="btnconsultar" type="submit" value="Acessar">
            </div>
        </form>

        <?php
        session_start(); // Iniciar a sessão

        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnconsultar)) {
            include_once 'Usuario.php';
            $u = new Usuario();
            $u->setUsuario($txtUsuario);
            $u->setSenha($txtSenha);
            $pro_bd = $u->logar();

            $exist = false;
            foreach ($pro_bd as $pro_mostrar) {
                $exist = true;
                // Cria a sessão para o usuário logado
                $_SESSION['usuario'] = $pro_mostrar[0];
                header("Location: menu.php"); // Redireciona para o menu após login bem-sucedido
                exit();
            }

            if (!$exist) {
                echo "<h5>Usuario ou senha invalido<h5>";
            }
        }
        ?>
    </div>
</body>

</html>
