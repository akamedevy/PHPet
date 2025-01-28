<?php

include "../../module/Database.php";
session_start();

var_dump($_SESSION);

$db = new Database();
$animais_dados = $db->select(
    table: "animais",
    where: "id_dono = " . $_SESSION['usuario_id'],
    // order:
    // limit:
    // fields:
);

var_dump($animais_dados);
$dados = $animais_dados[0];

// $verificar = Database::select(
//     table: "animais",
//     where: "id = 5",
//     // order: "name ASC",
//     // limit: "10",
//     // fields: "id, name, age"
// );

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consulta</title>
</head>
<body>
    <form action="">
        <h1>informações do animal</h1>

        <label for="selecionar-animal">Animal: </label>
        <select name="selecionar-animal" id="selecionar-animal">
            <option value="id1"><?php echo($dados['nome']) ?></option>
            <option value="id2">hagamenon</option>
        </select>

        <input type="text" name="nome" placeholder="Nome:" required>
        <input type="text" name="especie" placeholder="Especie:" required>
        <input type="text" name="raca" placeholder="Raça:" required>
        <input type="text" name="idade" placeholder="Idade:" required>

        <input class="botao-submit" type="submit" name="cadastrar">

        <h1>informações da consulta</h1>
        <label for="data">Data:</label>
        <input type="date" name="data" id="data">
        <label for="horario">Horario:</label>
        <input type="time" name="horario" id="horario">

        <label for="motivo">Motivo da consulta:</label>
        <input type="text" name="motivo_consulta" id="motivo">

        <label for="tipo-consulta">Tipo da consulta: </label>
        <select name="tipo-consulta" id="tipo-consulta">
            <option value="consulta-geral">Consulta Geral</option>
            <option value="emergencia">Emergência</option>
            <option value="pos-operatorio">Pós-Operatório</option>
            <option value="vacinação">Vacinação</option>
            <option value="filhotes">Filhotes</option>
            <option value="animais-idosos">Animais Idosos</option>
            <option value="dermatologica">Consulta Dermatológica</option>
            <option value="odontologica">Consulta Odontológica</option>
            <option value="comportamental">Consulta Comportamental</option>
            <option value="nutricional">Consulta Nutricional</option>
            <option value="gestantes">Consulta para Gestantes</option>
            <option value="exames">Consulta para Exames</option>
            <option value="segunda-opiniao">Segunda Opinião</option>
            <option value="banho-e-tosa">Banho e Tosa</option>
            <option value="documentacao">Consulta para Documentação</option>
            <option value="acompanhamento-cronico">Acompanhamento de Doenças Crônicas</option>
            <option value="eutanasia">Consulta para Eutanásia</option>
        </select>

        <label for="veterinario">Escolha o responsavel: </label>
        <select id="veterinario" name="veterinario" required>
            <option value="veterinario">Sawada</option>
            <option value="veterinario">Kaoru</option>
            <option value="veterinario">Marcos</option>
          </select>
    </form>
</body>
</html>