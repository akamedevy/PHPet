<?php

include "../module/Database.php";

class DeletarAnimal
{
    public function __construct()
    {
        $db = new Database();
        $deletar = $db->delete("animais", "id", $_GET['id_animal']);
    
        if ($deletar)
        {
            echo '<script> alert("Animal deletado com sucesso"); </script>';
            echo "<meta http-equiv='refresh' content='0.5;url=../public/html/meusAnimais.php'>";
        }
    }
}

$DeletarAnimal = new DeletarAnimal();






?>