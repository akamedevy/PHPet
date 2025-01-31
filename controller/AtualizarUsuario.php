<?php
include_once  "../../module/Database.php";

class AtualizarUsuario{


    public function atualizar($id, $nome, $cpf, $email, $senha, $tipo_usuario)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipo_usuario = $tipo_usuario;

        return (new Database)->update('id = '. $this->id, [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => $this->senha,
            'tipo_usuario' => $this->tipo_usuario,
        ]);
    }

}



?>