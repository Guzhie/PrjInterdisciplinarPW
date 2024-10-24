<?php
session_start(); // Iniciar a sessão

// Verificar se a sessão do usuário existe
if (!isset($_SESSION['usuario'])) {
    // Se a sessão não existir, redirecionar para a página de login
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Menu de Professor</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Menu de Professor</h1>

    <nav class="nav">
        <ul>
            <li><a href="cadastrarProfessor.php">Criar</a></li>
            <li><a href="consultarAltProfessor.php">Alterar</a></li>
            <li><a href="listarProfessor.php">Listar</a></li>
            <li><a href="consultarProfessor.php">Consultar</a></li>
            <li><a href="excluirProfessor.php">Exclusão</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>

</html>