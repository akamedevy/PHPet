<?php
include_once  "../../module/Database.php";

class AtualizarAnimal{


    public function atualizar($id, $nome, $especie, $raca, $idade)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->especie = $especie;
        $this->raca = $raca;
        $this->idade = $idade;

        return (new Database)->update("animais",'id = '. $this->id, [
            'nome' => $this->nome,
            'especie' => $this->especie,
            'raca' => $this->raca,
            'idade' => $this->idade,
        ]);
    }

}

?>