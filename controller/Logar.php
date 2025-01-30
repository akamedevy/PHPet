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

            // verifica se a senha que o usuario colocou no formulario corresponde a senha salva no banco de dados
            if ($usuario && $senha == $usuario["senha"])
            {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['cpf'] = $usuario['cpf'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['senha'] = $usuario['senha'];
                $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

                $nome_array = explode(" ", $_SESSION['nome']);
                $nome_usuario = ucfirst($nome_array[0]); // pega o primeiro nome do nome completo.

                $_SESSION['nome_formatado'] = $nome_usuario;
                
                if ($_SESSION['tipo_usuario'] == "administrador")
                {
                    header("location: ../public/html/admUsuarios.php");
                    exit();
                }
                else{
                    header("location: ../public/html/cadastro-animal.php");
                    exit();
                }


            }
            else
            {
                echo "senha ou cpf incorretos";
            }
        }
    }
}

$logar = new Logar();