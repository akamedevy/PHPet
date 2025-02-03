<?php

include_once "../../module/Database.php";
include_once "../../controller/CadastrarAnimal.php";
session_start();

$db = new Database();
$animais_dados = $db->select(
    table: "animais",
    where: "id_dono = " . $_SESSION['usuario_id'],
);

if (isset($_POST['cadastrar']))
{
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $id_dono = $_SESSION['usuario_id'];

    $cadastrar = new CadastrarAnimal($nome,$especie,$raca,$idade,$id_dono);
    $cadastrar->cadastrar();

    if ($cadastrar){
        echo '<script> alert("Animal cadastrado com sucesso") </script>';
        echo "<meta http-equiv='refresh' content='0.5;url=meusAnimais.php'>";
    }
}

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
        <i id="create-btn" class="fa-solid fa-plus create-btn"></i>
        <?php
            if(!$animais_dados)
            {
                echo("Não há animais");
            }

            foreach ($animais_dados as $animal)
            {
            echo '<div class="card">
            <i class="fa-solid fa-paw"></i>
            <h1 class="animal-nome">' . ucfirst($animal["nome"]) . '</h1>
                <div class="informacoes">
                <p class="animal-especie">' . ucfirst($animal['especie']) . '</p>
                <p class="animal-raca">' . ucfirst($animal["raca"]) . '</p>
                    <p class="animal-idade">Idade: <span>' . $animal['idade'] . '</span></p>
                </div>
            <a href="meusAnimaisEditar.php?id_animal=' . $animal['id'] . '" class="edit-btn"><i class="fa-solid fa-pencil"></i></a>
            <a href="../../controller/DeletarAnimal.php?id_animal=' . $animal['id'] . '" ><i class="fa-solid fa-xmark"></i></a>
        </div>';
            }
        ?>
    </div>

    
    <div id="editar-animal" class="hidden">
        <div class="editar">
            <a href="meusAnimais.php" class="close-btn"><i class="fa-solid fa-xmark fechar-form"></i></a>
            <form class="editar-form" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" placeholder="Nome:" required>
                <label for="especie">Especie:</label>
                <input type="text" name="especie" id="especie" placeholder="Especie:" required>
                <label for="raca">Raca:</label>
                <input type="text" name="raca" id="raca" placeholder="Raça:" required>
                <label for="idade">Idade:</label>
                <input type="text" name="idade" id="idade" placeholder="Idade:" required>

                <input class="botao-submit" type="submit" name="cadastrar" value="Cadastrar">
            </form>
        </div>
    </div>
</body>
</html>