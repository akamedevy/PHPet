<?php
include "../../module/Database.php";
session_start();
// var_dump($_SESSION);

$db = new Database();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="voltar">
        <a class="seta-voltar" href="homeUsuario.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>

    <div class="container">
        
        <?php
            if (!$consultas_dados)
            {
                echo "não há consultas";
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
                        echo '
                        <a href="">
                            <div class="card">
                                <i class="fa-solid fa-notes-medical"></i>
                                <h1 class="card-title">' . $animal['nome'] . '</h1>
                                <p class="card-p">' . $consulta['motivo'] . '</p>
                                <i class="fa-solid fa-clock"></i>
                                <h1 class="card-data">' . $consulta['dia'] . '</h1>
                                <p class="card-time">' . $consulta['horario'] . '</p>
                                <i class="fa-solid fa-user-doctor"></i>
                                <h1 class="doctor-name">' . $veterinario['nome'] . '</h1>
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