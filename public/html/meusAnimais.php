<?php

include "../../module/Database.php";
session_start();
// var_dump($_SESSION);

$db = new Database();
$animais_dados = $db->select(
    table: "animais",
    where: "id_dono = " . $_SESSION['usuario_id'],
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/meusAnimais.css">
    <script defer src="../js/meusAnimais.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="voltar">
        <a class="seta-voltar" href="homeUsuario.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>

    
    <div class="container">
        <?php
            foreach ($animais_dados as $animal)
            {
            echo '<div class="card">
            <i class="fa-solid fa-paw"></i>
            <h1 class="animal-nome">' . $animal["nome"] . '</h1>
            <p class="animal-raca">' . $animal["raca"] . '</p>
            <p class="animal-idade">Idade: <span>' . $animal['idade'] . '</span></p>
            <p class="animal-especie">' . $animal['especie'] . '</p>
            <a href="#" class="edit-btn"><i class="fa-solid fa-pencil"></i></a>
            <a href="#"><i class="fa-solid fa-xmark"></i></a>
        </div>';
            }
        ?>
    </div>

    <div id="editar-animal" class="hidden">
        <div class="editar">
            <a href="#" class="close-btn"><i class="fa-solid fa-xmark fechar-form"></i></a>
            <form class="editar-form">
                <select id="selecionar-animal" required>
                <option value="">Selecione um animal</option>
                <option value="">Cleiton</option>
                <input type="text" name="nome" placeholder="Nome:" required>
                <input type="text" name="especie" placeholder="Especie:" required>
                <input type="text" name="raca" placeholder="Raça:" required>
                <input type="text" name="idade" placeholder="Idade:" required>

                <input class="botao-submit" type="submit" name="cadastrar" value="Editar">
            </form>
        </div>
    </div>
</body>
</html>