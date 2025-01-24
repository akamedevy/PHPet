<?php
session_start();


// verifica se o usuario não esta logado
if (!isset($_SESSION['usuario_id']))
{
    header("location: logar.html");
    exit();
}

$nome_array = explode(" ", $_SESSION['nome']);
$nome = ucfirst($nome_array[0]);

// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="../css/homeU.css">
</head>
<body>
    <svg class="svgblob" id="sw-js-blob-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">                    <defs>                         <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">                            <stop id="stop1" stop-color="rgba(133.317, 55, 248, 1)" offset="0%"></stop>                            <stop id="stop2" stop-color="rgba(239.511, 31, 251, 1)" offset="100%"></stop>                        </linearGradient>                    </defs>                <path fill="url(#sw-gradient)" d="M22,-36.4C28.6,-34.2,34.2,-28.6,37.4,-22C40.7,-15.3,41.6,-7.7,41.7,0.1C41.8,7.8,41.1,15.6,37.8,22.1C34.5,28.6,28.5,33.8,21.7,36.8C15,39.9,7.5,40.9,0.6,39.8C-6.3,38.7,-12.5,35.6,-18,31.8C-23.5,28,-28.2,23.5,-31.3,18.1C-34.4,12.7,-35.9,6.3,-37.3,-0.8C-38.8,-8,-40.3,-16.1,-37.1,-21.3C-33.9,-26.6,-26.1,-29.2,-19.2,-31.1C-12.2,-33.1,-6.1,-34.4,0.8,-35.7C7.7,-37.1,15.4,-38.5,22,-36.4Z" width="100%" height="100%" transform="translate(50 50)" stroke-width="0" style="transition: 0.3s;" stroke="url(#sw-gradient)"></path></svg>
    <div class="home-info">
        <h1>Olá, <span><?php echo($nome) . "!" ?></span></h1>
        <p>Vamos começar cadastrando seu pet? basta preencher os dados ao lado!</p>
    </div>
</body>
</html>