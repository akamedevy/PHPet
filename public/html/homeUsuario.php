<?php
session_start();

// var_dump($_SESSION);

// if (isset($_POST['enviar']))
// {
//     var_dump($_POST);
// }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="stylesheet" href="../css/homeUsuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text">Bem-vindo ao <span>PHPET</span></h1>
        <div class="cards">
            <a href="agendarConsulta.php" class="card">
                <i class="fas fa-calendar-plus"></i>
                <h1>Agendar Consulta</h1>
            </a>
            <a href="meusAnimais.php" class="card">
                <i class="fas fa-paw"></i>
                <h1>Meus Animais</h1>
            </a>
            <a href="minhasConsultas.php" class="card">
                <i class="fas fa-notes-medical"></i>
                <h1>Minhas Consultas</h1>
            </a>
        </div>
    </div>
</body>
</html>