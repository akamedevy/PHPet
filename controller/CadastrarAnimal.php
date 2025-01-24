<?php

include_once  "../../module/AnimalDB.php";

class CadastrarAnimal{
    public function __construct($nome, $especie, $raca, $idade, $id_dono)
    {
        $this->nome = $nome;
        $this->especie = $especie;
        $this->raca = $raca;
        $this->idade = $idade;
        $this->id_dono = $id_dono;
    }
    
    public function cadastrar()
    {        
        $this->AnimalDB = new AnimalDB();
        $this->AnimalDB->insert($this->nome,$this->especie,$this->raca,$this->idade,$this->id_dono);
    }

    public static function verificar($id)  // função para verificar se o usuario já tem um animal cadastrado.
    {
        $AnimalDB = new AnimalDB();
        return $AnimalDB->verifyUser($id);
    }
}
?>