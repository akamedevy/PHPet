<?php
session_start();

// var_dump($_SESSION);

// if (isset($_POST['enviar']))
// {
//     var_dump($_POST);
// }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/homeUsuario.css">
</head>
<body>
    <div class="container">
        <div class="text">
            <h1><?php echo($_SESSION['nome_formatado']) ?>, escolha sua <span>operação</span></h1>
        </div>
        <a href="agendarConsulta.php">
        <div class="choice1 card">
            <h1> agendar consulta </h1>
        </div>
        </a>
        <a href="meusAnimais.php">
        <div class="choice2 card">
            <h1>meus animais</h1>
        </div>
        </a>
        <a href="minhasConsultas.php">
        <div class="choice3 card">
            <h1>minhas consultas</h1>
        </div>
        </a>
    </div>

    <!-- <form method="POST">
        <input type="date" name="data" id="">
        <input type="submit" name="enviar">
    </form> -->
</body>
</html>