<?php

include_once "../../module/Database.php";

class DeletarPessoa
{
    public function __construct()
    {
        $db = new Database();
        $deletar = $db->delete("usuarios", "id", $_GET['id_cliente']);
    
        if ($deletar)
        {
            echo '<script> alert("Usuário deletado com sucesso"); </script>';
            echo "<meta http-equiv='refresh' content='0.5;url=admUsuarios.php'>";
        }
    }
}

$DeletarPessoa = new DeletarPessoa();

?>