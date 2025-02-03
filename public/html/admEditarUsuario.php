<?php
include "../../module/Database.php";
include "../../controller/AtualizarUsuario.php";

$id_cliente = $_GET['id_cliente'];

$db = new Database();

$dados = $db->select(
    table: 'usuarios',
    where: "id = '$id_cliente'",
);

$dados_cliente = $dados[0];

if(isset($_POST['atualizar']))
{
    $id = $_GET['id_cliente'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario'];

    $atualizar = new AtualizarUsuario();
    $atualizar->atualizar($id, $nome, $cpf, $email, $senha, $tipo_usuario);

    if ($atualizar){
        echo '<script> alert("Usuario editado com sucesso") </script>';
        echo "<meta http-equiv='refresh' content='0.5;url=admUsuarios.php'>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <form method="POST">
        <h1>Editar dados</h1>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo($dados_cliente['nome']); ?>" required>
        <label for="cpf">Cpf:</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo($dados_cliente['cpf']); ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo($dados_cliente['email']); ?>" required>
        <label for="senha">Senha:</label>
        <input type="text" name="senha" id="senha" value="<?php echo($dados_cliente['senha']); ?>" required>
        <select id="tipo_usuario" name="tipo_usuario" required>
            <option value="<?php echo($dados_cliente['tipo_usuario']); ?>"><?php echo($dados_cliente['tipo_usuario']); ?></option>
            <option value="usuario">Usuário</option>
            <option value="veterinario">Veterinário</option>
            <option value="administrador">Administrador</option>
        </select>
        <input type="submit" name="atualizar" value="atualizar">
    </form>
</body>
</html>