<?php

include "../../controller/CadastrarAnimal.php";
session_start();

if (!isset($_SESSION['usuario_id']))
{
    header("location: logar.html"); // rala
    exit();
}

$verificar = CadastrarAnimal::verificar($_SESSION['usuario_id']);
if ($verificar == 1)
{
    header("location: homeUsuario.php"); // usuario ja cadastrou um animal
}

if (isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $id_dono = $_SESSION['usuario_id'];

    $cadastraranimal = new CadastrarAnimal($nome,$especie,$raca,$idade,$id_dono);
    $cadastraranimal->cadastrar();

    header("location: homeUsuario.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro-animal.css">
    <script defer src="../js/cadastrar-animal.js"></script>
    <title>Document</title>
</head>
<body>

    <img class="blob-background" src="../assets/img/blob-animal.png" alt="">
    <img class="blob-background2" src="../assets/img/blob-animal-2.png" alt="">

    <h1>Olá, <span><?php echo($_SESSION['nome_formatado']) . "!" ?></span></h1>
    <p>Vamos começar cadastrando seu pet?</p>
    <form method="POST" class="form-animais">
        <input type="text" name="nome" placeholder="Nome:" required>
        <input type="text" name="especie" placeholder="Especie:" required>
        <input type="text" name="raca" placeholder="Raça:" required>
        <input type="text" name="idade" placeholder="Idade:" required>

        <input class="botao-submit" type="submit" name="cadastrar" value="cadastrar">
    </form>
</body>
</html>