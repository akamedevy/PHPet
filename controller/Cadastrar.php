<?php

include "../module/Database.php";

class Cadastrar{
    public function __construct()
    {
        if (isset($_POST["cadastrar"]))
        {
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $tipo_usuario = $_POST["tipo_usuario"];

            $database = new Database();
            $database->insert($nome, $cpf, $email, $senha, $tipo_usuario);

            header('Location: ../public/html/logar.html');
            
            exit();
        }
    }
}

$cadastrar = new Cadastrar();
?>