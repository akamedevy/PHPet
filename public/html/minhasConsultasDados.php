<?php
include "../../module/Database.php";
session_start();
// mesma coisa que eu tive que fazer com os meus animais editar, se não for assim, -
// vai ser um cabaré da porra.

$db = new Database();

// dados para as informações adicionais quando você clica na consulta.
$consulta_info = $db->select(
    table: "consulta",
    where: "id = " . $_GET['id_consulta'],
);
$consulta_info = $consulta_info[0];

$animal_info = $db->select(
    table: "animais",
    where: "id = " . $consulta_info['id_animal'],
);
$animal_info = $animal_info[0];

$responsavel_info = $db->select(
    table: "usuarios",
    where: "id = " . $consulta_info['id_usuario']
);
$responsavel_info = $responsavel_info[0];

$veterinario_info = $db->select(
    table: "usuarios",
    where: "id = " . $consulta_info['id_veterinario']
);
$veterinario_info = $veterinario_info[0];

////////////////////////////////////////////////////////
// informações para listar todos animais
$consultas_dados = $db->select(
    table: "consulta",
    where: "id_usuario = " . $_SESSION['usuario_id'],
);

$veterinarios = $db->select(
    table: "usuarios",
    where: "tipo_usuario = 'veterinario'"
);

$veterinarios_assoc = [];
foreach ($veterinarios as $veterinario) {
    $veterinarios_assoc[$veterinario['id']] = $veterinario;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Consultas</title>
    <link rel="stylesheet" href="../css/minhasConsultas.css">
    <link rel="stylesheet" href="../css/minhasConsultasInfo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="voltar">
        <a class="seta-voltar" href="homeUsuario.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>

    <div class="information">
    <a href="minhasConsultas.php" class="close-btn"><i class="fa-solid fa-xmark"></i></a>
        <div class="information-container">
            <h1>Veterinario:</h1>
            <div class="responsavel-dados">
                <p class="responsavel-nome"><?php echo(ucwords($veterinario_info['nome'])) ?></p>
                <div class="info-values">
                    <p class="responsavel-cpf">CPF: <span><?php echo($veterinario_info['cpf']) ?></span></p>
                    <p class="responsavel-email"><span><?php echo($veterinario_info['email'])?></span></p>
                </div>
                <i class="fa-solid fa-user-doctor"></i>
            </div>

            <h1>Usuario:</h1>

            <div class="usuario-dados">
                <i class="fa-solid fa-user"></i>
                <p class="usuario-nome"><?php echo(ucwords($responsavel_info['nome'])) ?></p>
                <div class="info-values">
                <p class="usuario-cpf">CPF: <span><?php echo($responsavel_info['cpf']) ?></span></p>
                <p class="usuario-email"><span><?php echo($responsavel_info['email'])?></span></p>
                </div>
            </div>

            <h1>Animal:</h1>
            <div class="animal-dados">
                <i class="fa-solid fa-paw"></i>
                <p class="animal-nome"><?php echo(ucwords($animal_info['nome'])) ?></p>
                <div class="info-values">
                    <p><?php echo(ucwords($animal_info['especie'])) ?></p>
                    <p><?php echo(ucwords($animal_info['raca'])) ?></p>
                    <p>Idade: <span><?php echo($animal_info['idade']) ?></span></p>
                </div>
            </div>

            <h1>Detalhes:</h1>
            <div class="info-detalhes">
                <p id="detalhe-tipo">Tipo: <span><?php echo(ucwords($consulta_info['tipo'])) ?></span></p>
                <p>Motivo:</p>
                <span class="detalhe-motivo"><?php echo($consulta_info['motivo']) ?></span>
            </div>
        </div>
    </div>

    <div class="container">
        
        <?php
            if (!$consultas_dados)
            {
                echo "Não há consultas";
            }
        
            foreach ($consultas_dados as $consulta) {
                $animal_dados = $db->select(
                    table: "animais",
                    where: "id = " . $consulta['id_animal']
                );

                if (!empty($animal_dados)) {
                    $animal = $animal_dados[0];

                    $veterinario = $veterinarios_assoc[$consulta['id_veterinario']] ?? null;

                    if ($veterinario) {
                        $data = new DateTime($consulta['dia']);
                        $consulta['dia'] = date_format($data, "d/m/Y");
                        echo '
                        <a href="">
                            <div class="card">
                                <i class="fa-solid fa-notes-medical"></i>
                                <h1 class="card-title">' . ucwords($animal['nome']) . '</h1>
                                <p class="card-p">' . ucwords($consulta['tipo']) . '</p>
                                <i class="fa-solid fa-clock"></i>
                                <h1 class="card-data">' . $consulta['dia'] . '</h1>
                                <p class="card-time">' . $consulta['horario'] . '</p>
                                <i class="fa-solid fa-user-doctor"></i>
                                <h1 class="doctor-name">' . ucwords($veterinario['nome']) . '</h1>
                                <p class="doctor-type">Veterinario</p>
                            </div>
                        </a>
                        ';
                    }
                }
            }
        ?>
    </div>

</body>
</html>