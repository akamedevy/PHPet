<?php

include "../../controller/CadastrarAnimal.php";
session_start();

if (!isset($_SESSION['usuario_id']))
{
    header("location: logar.html");
    exit();
}

if (isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $id_dono = $_SESSION['usuario_id'];

    $cadastraranimal = new CadastrarAnimal($nome,$especie,$raca,$idade,$id_dono);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome:">
        <input type="text" name="especie" placeholder="Especie:">
        <input type="text" name="raca" placeholder="Raça:">
        <input type="text" name="idade" placeholder="Idade:">

        <input type="submit" name="cadastrar">
    </form>
</body>
</html>