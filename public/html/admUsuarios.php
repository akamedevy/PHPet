<?php

include "../../module/Database.php";
// session_start();
// var_dump($_SESSION);

$db = new Database();

global $dados;

if (isset($_POST['usuario'])){
    var_dump($_POST);

    $tabela = $_POST['usuario'];
    $dados = $db->select(
        table: 'usuarios',
        where: "tipo_usuario = '$tabela'",
        // order:
        // limit:
        // fields:
    );
}


// var_dump($usuarios_dados);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<form method="POST">
    <input type="submit" value="usuario" name="usuario">
    <input type="submit" value="veterinario" name="usuario">
    <input type="submit" value="administrador" name="usuario">
</form>

<h3> Clientes Cadastrados </h3>
    <table>
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>CPF</td>
            <td>EMAIL</td>
            <td>tipo de usuario</td>
            <td> Editar </td>
            <td> Excluir </td>
        </tr>
        <?php
            if(isset($_POST['usuario']))
            {
            foreach($dados as $usuarios){
                echo '
                <tr>
                    <td> '.$usuarios['id'].'  </td>
                    <td> '.$usuarios['nome'].'  </td>
                    <td> '.$usuarios['cpf'].'  </td>
                    <td> '.$usuarios['email'].'  </td>
                    <td> '.$usuarios['tipo_usuario'].'  </td>
                    <td> <a href="admEditarUsuario.php?id_cliente='.$usuarios['id'].'"> Editar </a>  </td>
                    <td> <a href="admExcluirUsuario.php?id_cliente='.$usuarios['id'].'"> Excluir </a>  </td>
                </tr>
                ';
            }
        }
        ?>
</body>
</html>