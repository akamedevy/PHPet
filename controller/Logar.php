<?php

include "../module/Database.php";

session_start();

class Logar{
    public function __construct()
    {
        if (isset($_POST["logar"]))
        {
            $cpf = $_POST["cpf"];
            $senha = $_POST["senha"];

            $database = new Database();
            $usuario = $database->login($cpf);

            if ($usuario && $senha == $usuario["senha"])
            {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['cpf'] = $usuario['cpf'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['senha'] = $usuario['senha'];
                $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

                header("location: ../public/html/home.php");
                exit();
            }
            else
            {
                echo "senha ou cpf incorretos";
            }
        }
    }
}

$logar = new Logar();