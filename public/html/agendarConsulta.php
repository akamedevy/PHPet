<?php

include "../../module/Database.php";
include "../../controller/Consulta.php";
session_start();

// var_dump($_SESSION);

$db = new Database();
$animais_dados = $db->select(
    table: "animais",
    where: "id_dono = " . $_SESSION['usuario_id'],
    // order:
    // limit:
    // fields:
);

$veterinarios_dados = $db->select(
    table: "usuarios",
    where: "tipo_usuario = 'veterinario'",
    // order:
    // limit:
    // fields:
);

// var_dump($animais_dados);
// var_dump($veterinarios_dados);
$dados = $animais_dados;

if(isset($_POST['cadastrar']))
{
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $motivo = $_POST['motivo_consulta'];
    $tipo = $_POST['tipo-consulta'];
    $id_animal = $_POST['id-animal'];
    $id_usuario = $_SESSION['usuario_id'];
    $id_veterinario = $_POST['id_veterinario'];

    $cadastrar = Consulta::cadastrar_consulta($data,$horario,$motivo,$tipo,$id_animal,$id_usuario,$id_veterinario);
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consulta</title>
</head>
<body>
    <form method="POST">
        <h1>informações do animal</h1>

        <label for="selecionar-animal">Animal: </label>
        <select name="id-animal" id="selecionar-animal" required>
            <option value="">Selecione um animal</option>
                <?php
                foreach ($animais_dados as $animal) {
                    echo '<option value="' . $animal['id'] . '">' . $animal['nome'] . '</option>';
                }
                ?>
        </select>

        <h1>informações da consulta</h1>
        <label for="data">Data:</label>
        <input type="date" name="data" id="data" required>
        <label for="horario">Horario:</label>
        <input type="time" name="horario" id="horario" required>

        <label for="motivo">Motivo da consulta:</label>
        <input type="text" name="motivo_consulta" id="motivo" required>

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
        <select id="veterinario" name="id_veterinario" required>
            <?php
            foreach ($veterinarios_dados as $veterinario) {
                echo '<option value="' . $veterinario['id'] . '">' . $veterinario['nome'] . '</option>';
            }
            ?>
          </select>

          <input type="submit" name="cadastrar" value="cadastrar">
    </form>
</body>
</html>