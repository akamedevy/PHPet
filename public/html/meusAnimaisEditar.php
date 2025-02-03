<?php
// tive que fazer isso com php, porquê senão eu teria que fazer uma gambiarra do krai
// pra pegar os dados de cada animal que você clicar com javascript -
// usando ajax, json, não sei oque, não sei o que la.

include "../../module/Database.php";
include "../../controller/AtualizarAnimal.php";
session_start();

if(isset($_POST['editar']))
{
    $nome  = $_POST['nome'];
    $especie  = $_POST['especie'];
    $raca  = $_POST['raca'];
    $idade  = $_POST['idade'];

    $atualizar = new AtualizarAnimal();
    $atualizar->atualizar($_GET['id_animal'], $nome, $especie, $raca, $idade);

    if ($atualizar){
        echo '<script> alert("Animal editado com sucesso") </script>';
        echo "<meta http-equiv='refresh' content='0.5;url=meusAnimais.php'>";
    }
}


$db = new Database();

// informações para listar todos animais
$animais_dados = $db->select(
    table: "animais",
    where: "id_dono = " . $_SESSION['usuario_id'],
);

// informações que vão aparecer ao editar cada animal
$editar_dados = $db->select(
    table: "animais",
    where: "id = " . $_GET['id_animal'],
);
$editar_dados = $editar_dados[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/meusAnimais.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="voltar">
        <a class="seta-voltar" href="homeUsuario.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>

    
    <div class="container">
        <i class="fa-solid fa-plus"></i>
        <?php
            foreach ($animais_dados as $animal)
            {
            echo '<div class="card">
            <i class="fa-solid fa-paw"></i>
            <h1 class="animal-nome">' . ucfirst($animal["nome"]) . '</h1>
                <div class="informacoes">
                    <p class="animal-raca">' . ucfirst($animal["raca"]) . '</p>
                    <p class="animal-idade">Idade: <span>' . $animal['idade'] . '</span></p>
                    <p class="animal-especie">' . ucfirst($animal['especie']) . '</p>
                </div>
            <a href="meusAnimaisEditar.php?id_animal=' . $animal['id'] . '" class="edit-btn"><i class="fa-solid fa-pencil"></i></a>
            <a href="#"><i class="fa-solid fa-xmark"></i></a>
        </div>';
            }
        ?>
    </div>

    <div id="editar-animal" class="active">
        <div class="editar">
            <a href="meusAnimais.php" class="close-btn"><i class="fa-solid fa-xmark fechar-form"></i></a>
            <form class="editar-form" method="POST">
                <!-- <select id="selecionar-animal" required>
                <option value="">Selecione um animal</option>
                <option value="">Cleiton</option> -->
                <label for="nome">Nome:</label>
                <input value="<?php echo(ucfirst($editar_dados['nome'])) ?>" type="text" name="nome" id="nome" placeholder="Nome:" required>
                <label for="especie">Especie:</label>
                <input value="<?php echo(ucfirst($editar_dados['especie'])) ?>" type="text" name="especie" id="especie" placeholder="Especie:" required>
                <label for="raca">Raca:</label>
                <input value="<?php echo(ucfirst($editar_dados['raca'])) ?>" type="text" name="raca" id="raca" placeholder="Raça:" required>
                <label for="idade">Idade:</label>
                <input value="<?php echo($editar_dados['idade']) ?>" type="text" name="idade" id="idade" placeholder="Idade:" required>

                <input class="botao-submit" type="submit" name="editar" value="Editar">
            </form>
        </div>
    </div>
</body>
</html>